<div x-data="ratesCalendar" class="w-full" @update="updateCalendar">

    <div x-show="!loading">
        <button x-on:click="openCalendar" class="w-full space-x-2 button button-light">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                <line x1="16" y1="3" x2="16" y2="7"></line>
                <line x1="8" y1="3" x2="8" y2="7"></line>
                <line x1="4" y1="11" x2="20" y2="11"></line>
                <rect x="8" y="15" width="2" height="2"></rect>
            </svg>
            <span>Rates Calendar</span>
        </button>
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
                    {{-- Calendar --}}
                    <div class="min-h-full" x-ref="calendar" wire:ignore></div>
                    <div id="newRateForm" class="flex items-center justify-between pt-5 space-x-10" :class="newRateActive ? 'opacity-100' : 'opacity-30'">
                        <span class="flex flex-col flex-grow">
                            <span class="text-sm font-medium text-gray-900">New Rate</span>
                            <span class="text-xs text-gray-500">Enter the new rate for the selected days. Leave blank to reset to default</span>
                        </span>
                        <div class="flex items-center space-x-2">
                            <div>
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm"> $ </span>
                                    </div>
                                    <input wire:model="new_rate" type="text" name="rate" id="rate" class="pl-6 mt-0 input" placeholder="0.00" x-bind:disabled="!newRateActive">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm"> USD </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center flex-none w-[68px] mt-1">
                                <div wire:loading.remove wire:target="updateRate">
                                    <button wire:click="updateRate" class="button">Save</button>
                                </div>
                                <div wire:loading wire:target="updateRate">
                                    <x-spinner size="8" />
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="flex justify-end mt-5 mb-0">
                        <span class="text-sm link">View all modified rates </span>
                    </div> --}}
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
                loading: true,
                newRateActive: false,
                calendar: null,
                defaultRate: {{ substr($property->default_rate, 0, -2) }},
                startDate: @entangle('start_date'),
                endDate: @entangle('end_date'),
                // events: @entangle('events'),
                async init() {
                    this.setupCalendar()

                    this.loading = false

                    this.openCalendar()
                },
                async setupCalendar() {
                    this.calendar = new Calendar(this.$refs.calendar, {
                        // events: (info, success) => success(this.events),
                        plugins: [dayGridPlugin, interaction],
                        initialDate: new Date,
                        initialView: 'dayGridMonth',
                        selectable: true,
                        fixedWeekCount: false,
                        unselectAuto: false,
                        height: "auto",
                        unselectAuto: true,
                        unselectCancel: '#newRateForm',
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
                            console.log(info);
                            var start = info.start
                            var end = info.end
                            end.setDate(end.getDate() - 1) // minus one day because full calendar is stewpid.

                            // format dates
                            start = start.toLocaleDateString('en-US')
                            end = end.toLocaleDateString('en-US')

                            // set dates on backend
                            this.startDate = start
                            this.endDate = end

                            this.newRateActive = true;
                        },
                        // user clicks away from calendar
                        unselect: (info) => {
                            this.newRateActive = false
                            @this.new_rate = null
                        },
                        dayCellDidMount: async function(info) {
                            var el = info.el;
                            var frame = el.querySelector('.fc-daygrid-day-frame');
                            var number = el.querySelector('.fc-daygrid-day-number');
                            var content = el.querySelector('.fc-daygrid-day-events');

                            // global styling
                            frame.classList.add('flex', 'flex-col', '!min-h-full', 'cursor-pointer')
                            number.classList.add('text-center', '!text-gray-900', 'w-full', 'font-medium', 'text-lg', '!text-muted')
                            content.classList.add('text-center', 'font-semibold', 'text-gray-400', 'text-xs')

                            // disabled days
                            if (info.isDisabled || info.isPast) {
                                frame.classList.add('opacity-25')
                            }

                            // today
                            if (info.isToday) {
                                frame.classList.add('bg-yellow-50')
                            }

                            if (await @this.hasRateChange(info.date)) {
                                content.classList.add('!text-primary')
                            }

                            if (!info.isPast) {
                                content.textContent = '$' + await @this.getRate(info.date)
                            }
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
                updateCalendar() {
                    this.calendar.destroy()
                    this.calendar.render()
                    console.log('it worked!');
                }
            }))
        })
    </script>
@endpush
