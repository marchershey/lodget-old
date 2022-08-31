<div x-data="ratesCalendar">

    <button x-on:click="openCalendar" class="button button-light">Open rates calendar</button>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-show="open" x-cloak class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div x-on:click.away="closeCalendar" class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
                    <div x-ref="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('ratesCalendar', () => ({
                    open: false,
                    calendar: null,
                    events: [{
                            id: 1,
                            title: 'Build my secret project 🛠',
                            start: '2022-06-05',
                            end: '2022-06-08',
                        },
                        {
                            id: 2,
                            title: 'Launch 🚀',
                            start: '2022-06-23',
                        },
                    ],
                    newEventTitle: null,
                    newEventStart: null,
                    newEventEnd: null,
                    init() {
                        this.calendar = new Calendar(this.$refs.calendar, {
                            events: (info, success) => success(this.events),
                            plugins: [dayGridPlugin],
                            initialDate: '2022-06-01',
                            initialView: 'dayGridMonth',
                            selectable: true,
                            unselectAuto: false,
                            editable: true,
                            select: (info) => {
                                this.newEventStart = info.startStr
                                this.newEventEnd = info.endStr
                            },
                            eventClick: (info) => {
                                if (confirm('Are you sure you want to remove this event?')) {
                                    const index = this.getEventIndex(info)
                                    this.events.splice(index, 1)
                                    this.calendar.refetchEvents()
                                }
                            },
                            eventChange: (info) => {
                                const index = this.getEventIndex(info)
                                this.events[index].start = info.event.startStr
                                this.events[index].end = info.event.endStr
                            },
                        })
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
                    getEventIndex(info) {
                        return this.events.findIndex((event) => event.id == info.event.id)
                    },
                    addEvent() {
                        if (!this.newEventTitle || !this.newEventStart) {
                            return alert('Please choose a title and start date for the event!')
                        }

                        let event = {
                            id: Date.now(),
                            title: this.newEventTitle,
                            start: this.newEventStart,
                            end: this.newEventEnd,
                        }

                        this.events.push(event)
                        this.calendar.refetchEvents()

                        this.newEventTitle = null
                        this.newEventStart = null
                        this.newEventEnd = null

                        this.calendar.unselect()
                    },


                }))
            })
        </script>
    @endpush
</div>
