<x-layouts.host :asideTop="true">

    <div>
        <x-slot:aside>
            <div class="flex items-center justify-between space-x-5 px-5 sm:flex-col sm:space-x-0 sm:space-y-5 sm:px-0" x-data="{ newPropertySlideover: false }">
                <a href="{{ route('host.properties') }}" class="button button-light">
                    <span>
                        <svg class="text-muted h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span>
                        Go back
                    </span>
                </a>
            </div>
        </x-slot:aside>

        <livewire:host.properties.edit-property-form :property="$property">
</x-layouts.host>
