<div class="panel padding spacing">
    <div>
        <h2 class="panel-heading">Property Types</h2>
        <span class="panel-desc">Property types are sorted alphabetically.</span>
    </div>
    @if ($property_types)
        <div class="flex flex-wrap gap-x-2 gap-y-2">
            @foreach ($property_types as $property_type)
                <div class="flex items-center bg-gray-100 divide-x divide-gray-200 rounded cursor-default select-none">
                    <span class="px-2 py-1 text-sm font-medium capitalize">{{ $property_type->name }}</span>
                    <button wire:click="delete({{ $property_type->id }})" wire:loading.remove wire:target="delete({{ $property_type->id }})" class="px-2 py-1 text-gray-400 cursor-pointer hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <div wire:loading wire:target="delete({{ $property_type->id }})" class="px-2 py-1">
                        <svg class="w-4 h-4 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div>
            No Property types
        </div>
    @endif
    <form wire:submit.prevent="addNewPropertyType">
        <x-forms.text label="Add Property Type" model="new_property_type" placeholder="Type property type name here..." />
    </form>
</div>
