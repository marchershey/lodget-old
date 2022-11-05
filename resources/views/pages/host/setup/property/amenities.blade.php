<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Amenities</h2>
            <p class="panel-desc">Describe what your property has to offer by adding some of these top amenities. You'll be able to add more after publishing your property.</p>
        </div>

        @if ($amenities)
            <div class="padding-t">
                <div class="border-t border-gray-200 divide-y divide-gray-200 -padding">
                    @foreach ($amenities as $amenity)
                        <label for="amenity-{{ $amenity->id }}" class="relative flex items-start padding-x padding-y-sm">
                            <div class="flex-1 min-w-0 text-sm">
                                <div class="font-medium text-gray-700 select-none">{{ $amenity->name }}</div>
                            </div>
                            <div class="flex items-center h-5 ml-3">
                                <input wire:model="selected_amenities" id="amenity-{{ $amenity->id }}" type="checkbox" class="checkbox" value="{{ $amenity->id }}">
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>
