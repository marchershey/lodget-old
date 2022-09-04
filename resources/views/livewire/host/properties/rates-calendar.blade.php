<div x-data="ratesCalendar">

    <div x-show="!loading">
        <button x-on:click="openCalendar" class="button button-light">Open rates calendar</button>
    </div>

    <div x-show="loading" class="flex justify-center">
        <x-spinner />
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-show="open" x-cloak class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div x-on:click.away="closeCalendar" class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
                    <div class="min-h-full" x-ref="calendar" wire:ignore></div>
                    <div class="" x-ref="updatebox">
                        test
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-show="slideover" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
                    <div class="w-screen max-w-md pointer-events-auto">
                        <div class="flex flex-col h-full bg-white divide-y divide-gray-200 shadow-xl">
                            <div class="flex flex-col flex-1 min-h-0 py-6 overflow-y-scroll">
                                <div class="px-4 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panel title</h2>
                                        <div class="flex items-center ml-3 h-7">
                                            <button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <span class="sr-only">Close panel</span>
                                                <!-- Heroicon name: outline/x-mark -->
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex-1 px-4 mt-6 sm:px-6">
                                    <!-- Replace with your content -->
                                    <div class="h-full border-2 border-gray-200 border-dashed" aria-hidden="true"></div>
                                    <!-- /End replace -->
                                </div>
                            </div>
                            <div class="flex justify-end flex-shrink-0 px-4 py-4">
                                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('ratesCalendar', () => ({
                    open: false,
                    slideover: false,
                    loading: true,
                    calendar: null,
                    defaultRate: {{ substr($property->default_rate, 0, -2) }},
                    startDate: @entangle('startDate'),
                    endDate: @entangle('endDate'),
                    async init() {
                        await @this.test();

                        this.calendar = new Calendar(this.$refs.calendar, {
                            // events: (info, success) => success(this.events),
                            plugins: [dayGridPlugin, interaction],
                            initialDate: new Date,
                            initialView: 'dayGridMonth',
                            selectable: true,
                            fixedWeekCount: false,
                            unselectAuto: false,
                            height: "auto",

                            // initial click...
                            selectAllow: (info) => {
                                // check if first selected date is greater or equal to today
                                var today = new Date().setHours(0, 0, 0, 0)
                                var selectedDate = new Date(info.start).setHours(0, 0, 0, 0)

                                if (selectedDate >= today) {
                                    return true;
                                }

                                return false;
                            },

                            // after selection has been made...
                            select: (info) => {
                                this.slideover = true;
                                var start = info.start
                                var end = info.end
                                end.setDate(end.getDate() - 1) // minus one day because full calendar is stewpid.

                                // format dates
                                start = start.toLocaleDateString('en-US')
                                end = end.toLocaleDateString('en-US')

                                // set dates on backend
                                this.startDate = start
                                this.endDate = end

                                // prompt user for amount
                                var amount = prompt("Change the nightly rate for " + (start == end ? start : start + ' through ' + end), this.defaultRate)

                                // cancel if amount is null
                                if (amount === null) return

                                alert(amount);
                            },
                            dayCellDidMount: function(info) {

                                var el = info.el;
                                var frame = el.querySelector('.fc-daygrid-day-frame');
                                var number = el.querySelector('.fc-daygrid-day-number');
                                var content = el.querySelector('.fc-daygrid-day-events');

                                if (info.isPast) {
                                    frame.classList.add('opacity-25', 'cursor-not-allowed');
                                }

                                frame.classList.add('flex', 'flex-col', '!min-h-full')
                                number.classList.add('text-center', 'w-full', 'font-semibold')
                                content.classList.add('text-center')

                                if (!info.isDisabled) {
                                    content.textContent = '{{ "$" . substr($property->default_rate, 0, -2) }}'
                                } else {
                                    frame.classList.add('text-gray-300')
                                }
                            },
                        })

                        this.loading = false
                    },
                    async openCalendar() {
                        this.open = true
                        await this.$nextTick()
                        this.calendar.render()
                    },
                    closeCalendar() {
                        this.open = false;
                        this.calendar.destroy()
                    },


                }))
                // Alpine.data('ratesCalendar', () => ({
                //     open: false,
                //     calendar: null,
                //     // events: [{
                //     //         id: 1,
                //     //         title: 'Build my secret project 🛠',
                //     //         start: '2022-09-05',
                //     //         end: '2022-09-08',
                //     //     },
                //     //     {
                //     //         id: 2,
                //     //         title: 'Launch 🚀',
                //     //         start: '2022-09-23',
                //     //     },
                //     // ],
                //     newEventTitle: null,
                //     newEventStart: null,
                //     newEventEnd: null,
                //     init() {
                //         this.calendar = new Calendar(this.$refs.calendar, {
                //             // events: (info, success) => success(this.events),
                //             plugins: [dayGridPlugin, interaction],
                //             initialDate: new Date,
                //             initialView: 'dayGridMonth',
                //             selectable: true,
                //             // showNonCurrentDates: false,
                //             fixedWeekCount: false,
                //             // unselectAuto: false,
                //             // editable: true,
                //             height: "auto",

                //             select: (info) => {
                //                 console.log(info);
                //                 if (info.isPast) {
                //                     return false;
                //                 }
                //                 // this.newEventStart = info.startStr
                //                 // this.newEventEnd = info.endStr
                //                 // alert('selected ' + info.startStr + ' to ' + info.endStr);
                //             },
                //             // dateClick: function(info) {
                //             //     alert('clicked ' + info.dateStr);
                //             // },
                //             // eventClick: (info) => {
                //             //     if (confirm('Are you sure you want to remove this event?')) {
                //             //         const index = this.getEventIndex(info)
                //             //         this.events.splice(index, 1)
                //             //         this.calendar.refetchEvents()
                //             //     }
                //             // },
                //             // eventChange: (info) => {
                //             //     const index = this.getEventIndex(info)
                //             //     this.events[index].start = info.event.startStr
                //             //     this.events[index].end = info.event.endStr
                //             // },
                //             dayCellDidMount: function(info) {

                //                 var el = info.el;
                //                 var frame = el.querySelector('.fc-daygrid-day-frame');
                //                 var number = el.querySelector('.fc-daygrid-day-number');
                //                 var content = el.querySelector('.fc-daygrid-day-events');

                //                 if (info.isPast) {
                //                     frame.classList.add('opacity-25');
                //                 }

                //                 frame.classList.add('flex', 'flex-col', '!min-h-full')
                //                 number.classList.add('text-center', 'w-full', 'font-semibold')
                //                 content.classList.add('text-center')

                //                 if (!info.isDisabled) {
                //                     content.textContent = "${{ substr($property->default_rate, 0, -2) }}"
                //                     // content.textContent = "{{ Cknow\Money\Money::USD($property->default_rate, false) }}"

                //                     // number.classList.add('!absolute', '!top-0', '!right-0')

                //                     // frame.classList.add('relative')
                //                     // number.classList.add('text-gray-300')
                //                     // content.classList.add('absolute', 'bottom-0')
                //                     // content.textContent = "test"
                //                 } else {
                //                     frame.classList.add('text-gray-300')
                //                 }

                //                 // console.log(info);
                //                 // const target = el.getElementByClassname('fc-daygrid-day-events')
                //                 // const div = el.querySelector('.fc-daygrid-day-bottom');
                //                 // // const div = document.createElement('div');
                //                 // div.classList.add('w-full', 'text-center');
                //                 // div.textContent = '$348.00';
                //                 // // target.appendChild(div);

                //                 // date - Date object
                //                 // dayNumberText
                //                 // isPast
                //                 // isFuture
                //                 // isToday
                //                 // isOther
                //                 // resource - if the date cell lives under a specific resource in vertical resource view, this value will be the Resource Object
                //                 // el - the <td> element. only available in dayCellDidMount and dayCellWillUnmount
                //             },



                //         })

                //         this.openCalendar()
                //     },
                //     async openCalendar() {
                //         this.open = true
                //         await this.$nextTick()
                //         this.calendar.render()
                //     },
                //     closeCalendar() {
                //         this.open = false;
                //         this.calendar.destroy()
                //     },
                //     getEventIndex(info) {
                //         return this.events.findIndex((event) => event.id == info.event.id)
                //     },
                //     addEvent() {
                //         if (!this.newEventTitle || !this.newEventStart) {
                //             return alert('Please choose a title and start date for the event!')
                //         }

                //         let event = {
                //             id: Date.now(),
                //             title: this.newEventTitle,
                //             start: this.newEventStart,
                //             end: this.newEventEnd,
                //         }

                //         this.events.push(event)
                //         this.calendar.refetchEvents()

                //         this.newEventTitle = null
                //         this.newEventStart = null
                //         this.newEventEnd = null

                //         this.calendar.unselect()
                //     },


                // }))
            })
        </script>
    @endpush
</div>
