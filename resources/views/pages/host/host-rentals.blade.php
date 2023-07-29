<x-layouts.host>
    <div x-data="{ newRentalSlide: false }">

        <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            <li class="relative">
                <div class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-h-7 aspect-w-10 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                    <img src="https://i.imgur.com/cgfopKP.jpg" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <button type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">View details for Ohana Burnside</span>
                    </button>
                </div>
                <p class="block mt-2 text-sm font-medium text-gray-900 truncate pointer-events-none">Ohana Burnside</p>
                <p class="block text-sm font-medium text-gray-500 pointer-events-none">$348</p>
            </li>
            <li class="relative">
                <a href="{{ route('host.rentals') }}" class="block w-full overflow-hidden bg-gray-200 rounded-lg focus:outline-none group aspect-h-7 aspect-w-10 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                    </div>
                </a>
            </li>
        </ul>

        {{-- New Rental Slide --}}
        <div class="relative z-40" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/60"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none sm:pl-16">
                        <div class="w-screen max-w-2xl pointer-events-auto">
                            <form class="flex flex-col h-full overflow-y-scroll">
                                <div class="flex-1 bg-white">
                                    <div class="px-4 py-6 bg-primary sm:px-6">
                                        <div class="flex items-start justify-between space-x-3">
                                            <div class="space-y-1">
                                                <h2 class="text-base font-medium leading-6 text-white" id="slide-over-title">Add New Rental</h2>
                                                <p class="text-xs text-blue-200">Fill out the information below to add your new rental property.</p>
                                            </div>
                                            <div class="flex items-center h-7">
                                                <button type="button" class="text-blue-200 hover:text-white">
                                                    <span class="sr-only">Close panel</span>
                                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-6 space-y-6 sm:space-y-0 sm:divide-y sm:divide-gray-200 sm:py-0">
                                        <!-- Project name -->
                                        <div class="px-4 space-y-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <label for="project-name" class="block text-sm font-medium leading-6 text-gray-900 sm:mt-1.5">Project name</label>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <input type="text" name="project-name" id="project-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <!-- Project description -->
                                        <div class="px-4 space-y-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <label for="project-description" class="block text-sm font-medium leading-6 text-gray-900 sm:mt-1.5">Description</label>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <textarea id="project-description" name="project-description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                            </div>
                                        </div>

                                        <!-- Team members -->
                                        <div class="px-4 space-y-2 sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <div>
                                                <h3 class="text-sm font-medium leading-6 text-gray-900">Team Members</h3>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div class="flex space-x-2">
                                                    <a href="#" class="flex-shrink-0 rounded-full hover:opacity-75">
                                                        <img class="inline-block w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Tom Cook">
                                                    </a>
                                                    <a href="#" class="flex-shrink-0 rounded-full hover:opacity-75">
                                                        <img class="inline-block w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Whitney Francis">
                                                    </a>
                                                    <a href="#" class="flex-shrink-0 rounded-full hover:opacity-75">
                                                        <img class="inline-block w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Leonard Krasner">
                                                    </a>
                                                    <a href="#" class="flex-shrink-0 rounded-full hover:opacity-75">
                                                        <img class="inline-block w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Floyd Miles">
                                                    </a>
                                                    <a href="#" class="flex-shrink-0 rounded-full hover:opacity-75">
                                                        <img class="inline-block w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Emily Selman">
                                                    </a>

                                                    <button type="button" class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-gray-400 bg-white border-2 border-gray-200 border-dashed rounded-full hover:border-gray-300 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                        <span class="sr-only">Add team member</span>
                                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Privacy -->
                                        <fieldset class="px-4 space-y-2 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:space-y-0 sm:px-6 sm:py-5">
                                            <legend class="sr-only">Privacy</legend>
                                            <div class="text-sm font-medium leading-6 text-gray-900" aria-hidden="true">Privacy</div>
                                            <div class="space-y-5 sm:col-span-2">
                                                <div class="space-y-5 sm:mt-0">
                                                    <div class="relative flex items-start">
                                                        <div class="absolute flex items-center h-6">
                                                            <input id="public-access" name="privacy" aria-describedby="public-access-description" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600" checked>
                                                        </div>
                                                        <div class="text-sm leading-6 pl-7">
                                                            <label for="public-access" class="font-medium text-gray-900">Public access</label>
                                                            <p id="public-access-description" class="text-gray-500">Everyone with the link will see this project</p>
                                                        </div>
                                                    </div>
                                                    <div class="relative flex items-start">
                                                        <div class="absolute flex items-center h-6">
                                                            <input id="restricted-access" name="privacy" aria-describedby="restricted-access-description" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6 pl-7">
                                                            <label for="restricted-access" class="font-medium text-gray-900">Private to Project Members</label>
                                                            <p id="restricted-access-description" class="text-gray-500">Only members of this project would be able to access</p>
                                                        </div>
                                                    </div>
                                                    <div class="relative flex items-start">
                                                        <div class="absolute flex items-center h-6">
                                                            <input id="private-access" name="privacy" aria-describedby="private-access-description" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6 pl-7">
                                                            <label for="private-access" class="font-medium text-gray-900">Private to you</label>
                                                            <p id="private-access-description" class="text-gray-500">You are the only one able to access this project</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border-gray-200">
                                                <div class="flex flex-col items-start space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                                                    <div>
                                                        <a href="#" class="group flex items-center space-x-2.5 text-sm font-medium text-indigo-600 hover:text-indigo-900">
                                                            <svg class="w-5 h-5 text-indigo-500 group-hover:text-indigo-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                                                                <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                                                            </svg>
                                                            <span>Copy link</span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="group flex items-center space-x-2.5 text-sm text-gray-500 hover:text-gray-900">
                                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span>Learn more about sharing</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="flex-shrink-0 px-4 py-5 bg-gray-200 border-t border-gray-200 sm:px-6">
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" class="px-3 py-2 text-sm font-medium text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</button>
                                        <button type="submit" class="inline-flex justify-center px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</x-layouts.host>
