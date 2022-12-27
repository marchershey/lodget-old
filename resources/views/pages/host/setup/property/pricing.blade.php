<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Pricing & Fees</h2>
            <p class="panel-desc">Edit the nightly rate and minimum number of nights. </p>
        </div>
        <div class="form">
            <div class="col-span-full laptop:col-span-4">
                <x-forms.text class="money" label="Nightly Base Rate" model="property.pricing.base_rate" placeholder="0.00" desc="How much do you to charge guests per night, excluding any extra taxes or fees?" />
            </div>
            {{-- <div class="col-span-full laptop:col-span-4">
                <x-forms.text label="Minimum Nights" model="property.pricing.min_nights" placeholder="0" desc="Require your guests to stay a minimum number of nights." />
            </div> --}}
        </div>
    </div>

    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Tax Settings</h2>
            <p class="panel-desc">Edit the tax rate.</p>
        </div>
        <div class="form">
            <div class="col-span-full laptop:col-span-4">
                <x-forms.text label="Tax Rate (%)" model="property.pricing.tax_rate" placeholder="0" desc="The tax percentage is calculated on the entire total after fees. " />
            </div>
        </div>
    </div>

    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Fees</h2>
            <p class="panel-desc">Let's add some fees to help cover some of the costs.</p>
        </div>
        {{-- <div class="text-sm alert alert-blue padding-sm">
            <span class="font-semibold">Please note:</span> Fees are applied to the base rate, not the final cost.
        </div> --}}
        <div class="text-gray-600 alert alert-gray padding-sm spacing-xs">
            <span class="font-semibold">Fee types:</span>
            <ul class="text-sm list-disc list-inside">
                <li><span class="font-semibold">Fixed:</span> Flat rate fees that are added to the <span class="font-semibold">final cost</span>.</li>
                <li><span class="font-semibold">Percentage:</span> Fees that are a percentage of the total <span class="font-semibold">base cost</span>.</li>
            </ul>
        </div>
        <div class="form">
            <div class="col-span-full">
                <button wire:click="addFee()" class="button button-full button-light">Add a fee</button>
            </div>
            @if (isset($property['pricing']['fees']))
                <div class="spacing-sm col-span-full">
                    @foreach ($property['pricing']['fees'] as $fee_key => $fee)
                        <div class="grid grid-cols-10 gap-3 padding-sm card card-dark">
                            <div class="col-span-3">
                                <x-forms.text label="Fee Name" model="property.pricing.fees.{{ $fee_key }}.name" placeholder="Name" desc="" class="input-light" />
                            </div>
                            <div class="col-span-3">
                                <x-forms.text label="Amount" model="property.pricing.fees.{{ $fee_key }}.amount" placeholder="0" desc="" class="input-light" />
                            </div>
                            <div class="col-span-3">
                                <x-forms.select label="Fee Type" model="property.pricing.fees.{{ $fee_key }}.type" :options="['fixed' => 'Fixed', 'percent' => 'Percentage']" class="input-light" />
                            </div>
                            <div class="flex items-center justify-center mt-7 @error('property.pricing.fees.' . $fee_key . '.*') mb-4 @enderror">
                                <button wire:click="removeFee({{ $fee_key }})" class="cursor-pointer text-muted hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>
