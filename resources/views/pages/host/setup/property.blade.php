<x-layouts.host>

    <div x-data="tabs" class="padding spacing">
        <div>
            <h1 class="page-heading">Property Setup</h1>
            <p class="page-desc">Fill out the information below to create your first property.</p>
        </div>

        <div class="panel spacing">
            <div>
                <h2 class="panel-heading">Basic Information</h2>
                <p class="panel-desc">The basic information about your property</p>
            </div>

            <form action="" class="form">
                <div class="col-span-full laptop:col-span-4">
                    <label for="property-name" class="input-label @error('property.name') text-red-500 @enderror">Property Name</label>
                    <input wire:model.lazy="property.name" wire:loading.delay.attr="disabled" id="property-name" type="text" class="capitalize input input-dark" autocomplete="property-name">
                </div>
                <div class="col-span-full">
                    <label for="property-street" class="input-label @error('property.street') text-red-500 @enderror">Street Address</label>
                    <input wire:model.lazy="property.street" wire:loading.delay.attr="disabled" id="property-street" type="text" class="capitalize input input-dark" autocomplete="property-street">
                </div>
                <div class="col-span-full laptop:col-span-2">
                    <label for="property-city" class="input-label @error('property.city') text-red-500 @enderror">City</label>
                    <input wire:model.lazy="property.city" wire:loading.delay.attr="disabled" id="property-city" type="text" class="capitalize input input-dark" autocomplete="property-city">
                </div>
                <div class="col-span-full laptop:col-span-2">
                    <label for="property-state" class="input-label @error('property.state') text-red-500 @enderror">State</label>
                    <input wire:model.lazy="property.state" wire:loading.delay.attr="disabled" id="property-state" type="text" class="capitalize input input-dark" autocomplete="property-state">
                </div>
                <div class="col-span-full laptop:col-span-2">
                    <label for="property-zip" class="input-label @error('property.zip') text-red-500 @enderror">Zip / Postal code</label>
                    <input wire:model.lazy="property.zip" wire:loading.delay.attr="disabled" id="property-zip" type="text" class="capitalize input input-dark" autocomplete="property-zip">
                </div>
            </form>
        </div>

        <div class="flex items-center justify-between">
            <button wire:click="test" class="button button-black">Continue</button>
        </div>
    </div>
</x-layouts.host>
