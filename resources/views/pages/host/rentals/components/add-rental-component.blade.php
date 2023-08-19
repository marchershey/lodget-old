<div class="page-content" wire:init="load">
    <div class="card-sm">
        <div class="card-heading">
            <div>
                <h3 class="card-title">Overview</h3>
                <p class="card-desc">The most basic information about your rental.</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-full">
                <x-inputs.text wiremodel="name" wiretarget="submit" desc="Give your rental a name that will be visible to guests." label="Name" />
            </div>
            <div class="col-span-full">
                <x-inputs.textarea wiremodel="summary" wiretarget="submit" label="Summary" desc="Write a quick summary of your rental property. You'll be able to give a detail description later on." />
            </div>
            <div class="col-span-full">
                <x-inputs.select wiremodel="type" wiretarget="submit" label="Type" desc="What kind of property type is your rental?" :options="['House' => 'House', 'Apartment' => 'Apartment', '' => '----------------', 'Bed & Breakfast' => 'Bed & Breakfast', 'Boat' => 'Boat', 'Bungalow' => 'Bungalow', 'Cabin' => 'Cabin', 'Camping' => 'Camping', 'Chalet' => 'Chalet', 'Condominium' => 'Condominium', 'Farm House' => 'Farm House', 'Hospital' => 'Hospital', 'Hostel' => 'Hostel', 'Hotel' => 'Hotel', 'Inn' => 'Inn', 'Mobile Home' => 'Mobile Home', 'Motel' => 'Motel', 'Resort' => 'Resort', 'Room' => 'Room', 'Student housing' => 'Student housing', 'Villa' => 'Villa']" />
            </div>
            <div class="col-span-full">
                <x-inputs.counter wiremodel="capacity" wiretarget="submit" label="How many guests can stay in your rental?" desc="The number of guests your rental property can sleep." max="99" min="1" />
            </div>
        </div>
    </div>
    <div class="card-sm">
        <div class="card-heading">
            <div>
                <h3 class="card-title">Location</h3>
                <p class="card-desc">Where your rental property can be found.</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-y-5 gap-x-3">
            <div class="col-span-full">
                <x-inputs.text wiremodel="address_street" wiretarget="submit" label="Address" />
            </div>
            <div class="col-span-6">
                <x-inputs.text wiremodel="address_city" wiretarget="submit" label="City" />
            </div>
            <div class="col-span-3">
                <x-inputs.select wiremodel="address_state" wiretarget="submit" label="State" :options="['AL' => 'AL', 'AK' => 'AK', 'AR' => 'AR', 'AZ' => 'AZ', 'CA' => 'CA', 'CO' => 'CO', 'CT' => 'CT', 'DC' => 'DC', 'DE' => 'DE', 'FL' => 'FL', 'GA' => 'GA', 'HI' => 'HI', 'IA' => 'IA', 'ID' => 'ID', 'IL' => 'IL', 'IN' => 'IN', 'KS' => 'KS', 'KY' => 'KY', 'LA' => 'LA', 'MA' => 'MA', 'MD' => 'MD', 'ME' => 'ME', 'MI' => 'MI', 'MN' => 'MN', 'MO' => 'MO', 'MS' => 'MS', 'MT' => 'MT', 'NC' => 'NC', 'NE' => 'NE', 'NH' => 'NH', 'NJ' => 'NJ', 'NM' => 'NM', 'NV' => 'NV', 'NY' => 'NY', 'ND' => 'ND', 'OH' => 'OH', 'OK' => 'OK', 'OR' => 'OR', 'PA' => 'PA', 'RI' => 'RI', 'SC' => 'SC', 'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX', 'UT' => 'UT', 'VT' => 'VT', 'VA' => 'VA', 'WA' => 'WA', 'WI' => 'WI', 'WV' => 'WV', 'WY' => 'WY']" />
            </div>
            <div class="col-span-3">
                <x-inputs.text wiremodel="address_zip" wiretarget="submit" label="Zip" type="tel" class="mask-zip" />
            </div>
        </div>
    </div>

    <div class="card-sm">
        <div class="card-heading">
            <div>
                <h3 class="card-title">Rates</h3>
                <p class="card-desc">The nightly rate of your rental.</p>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-5 card-content">
            <div class="col-span-6">
                <x-inputs.text wiremodel="base_rate" wiretarget="submit" label="Nightly Rate" desc="The default price per night." type="tel" class="mask-currency" />
            </div>
            <div class="col-span-full">
                <x-inputs.counter wiremodel="minimum_nights" wiretarget="submit" label="Minimum Nights" desc="Minimum number of nights per stay." min="1" />
            </div>

        </div>
    </div>

    <div class="bg-blue-50 card-sm">
        <div class="flex space-x-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 2l.642 .005l.616 .017l.299 .013l.579 .034l.553 .046c4.687 .455 6.65 2.333 7.166 6.906l.03 .29l.046 .553l.041 .727l.006 .15l.017 .617l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.455 4.687 -2.333 6.65 -6.906 7.166l-.29 .03l-.553 .046l-.727 .041l-.15 .006l-.617 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.687 -.455 -6.65 -2.333 -7.166 -6.906l-.03 -.29l-.046 -.553l-.041 -.727l-.006 -.15l-.017 -.617l-.004 -.318v-.648l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.455 -4.687 2.333 -6.65 6.906 -7.166l.29 -.03l.553 -.046l.727 -.041l.15 -.006l.617 -.017c.21 -.003 .424 -.005 .642 -.005zm0 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" stroke-width="0" fill="currentColor"></path>
                </svg>
            </div>
            <div class="text-sm">
                <span class="font-medium">Please note:</span> After submitting this form, you will be redirected to the new rental's page with more options that need to be completed.
            </div>
        </div>
    </div>
</div>
