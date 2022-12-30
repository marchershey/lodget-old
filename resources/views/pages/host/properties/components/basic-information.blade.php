<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Basic Information</h2>
            <p class="panel-desc">The basic information about your property</p>
        </div>
        <div class="form">
            <div class="col-span-full laptop:col-span-4">
                <x-forms.text label="Property Name" model="property.name" />
            </div>
            <div class="col-span-full">
                <x-forms.text label="Street Address" model="property.address" />
            </div>
            <div class="col-span-full laptop:col-span-2">
                <x-forms.text label="City" model="property.city" />
            </div>
            <div class="col-span-full laptop:col-span-2">
                {{-- <x-forms.text label="State" model="property.address.state" /> --}}
                <x-forms.select label="State" model="property.state" :options="['AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District Of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
            </div>
            <div class="col-span-full laptop:col-span-2">
                <x-forms.text label="Zip / Postal Code" model="property.zip" />
            </div>
        </div>
    </div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
    </div>
</div>
