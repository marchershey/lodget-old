<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Extra Options</h2>
            <p class="panel-desc">Below you can tweak some of the options.</p>
        </div>
        <div class="form">
            <div class="col-span-full laptop:col-span-4">
                <x-forms.text label="Minimum Nights" model="property.options.min_nights" placeholder="0" desc="Require the guest stay a minimum number of nights." />
            </div>
        </div>
    </div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>
