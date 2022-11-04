<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Property Details</h2>
            <p class="panel-desc">What does your property have to offer?</p>
        </div>
        <div class="form">
            <div class="col-span-full laptop:col-span-3">
                @if ($default_types)
                    <x-forms.select label="Property Type" model="property.type" :options="$default_types" />
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>
