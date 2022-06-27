<x-layouts.guest pageTitle="Dashboard">

    <div class="panel">
        <h1 class="panel-heading">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                <line x1="16" y1="3" x2="16" y2="7"></line>
                <line x1="8" y1="3" x2="8" y2="7"></line>
                <line x1="4" y1="11" x2="20" y2="11"></line>
                <rect x="8" y="15" width="2" height="2"></rect>
            </svg>
            <span>
                Recent Reservations
            </span>
        </h1>
        <div class="text-center">
            <h3 class="font-medium text-gray-900">No reservations found</h3>
            <p class="mt-1 text-sm text-gray-500">Looks like you haven't reserved any properties yet. Tap the button below to start your first reservation!</p>
            <div class="mt-6">
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    View Properties
                </button>
            </div>
        </div>
    </div>

    <div class="panel">
        <h1 class="panel-heading">
            <svg xmlns="http://www.w3.org/2000/svg" class="" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                <line x1="12" y1="12" x2="12" y2="12.01"></line>
                <line x1="8" y1="12" x2="8" y2="12.01"></line>
                <line x1="16" y1="12" x2="16" y2="12.01"></line>
            </svg>
            <span>
                Support Messages
            </span>
        </h1>
        <div class="text-center">
            <h3 class="font-medium text-gray-900">We're here for you!</h3>
            <p class="mt-1 text-sm text-gray-500">If at any time you have any questions, concerns, or feedback about your stay, please reach out to us!</p>
            <div class="mt-6">
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Send a Message
                </button>
            </div>
        </div>
    </div>

</x-layouts.guest>
