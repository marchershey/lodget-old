<x-layouts.host :asideTop="true">

    <div>
        <x-slot:aside>
            <div x-data="{ newPropertySlideover: false }">
                <button class="w-full button" x-on:click="newPropertySlideover = true">Add New Property</button>

                @livewire('host.properties.new-property-form')
            </div>
        </x-slot:aside>

        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
        <div class="panel"></div>
    </div>
</x-layouts.host>
