<span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
<div class="input-counter-container" x-data="{
    value: @entangle($wiremodel),
    step: {{ $step }},
    min: {{ $min }},
    max: {{ $max }},
    add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
    subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
    addDisabled() { return this.value >= this.max },
    subtractDisabled() { return this.value <= this.min }
}">
    {{-- Subtract button --}}
    <button wire:loading.attr="disabled" wire:target="{{ $wiretarget }}" x-on:click="subtract()" x-bind:disabled="subtractDisabled" type="button" class="input-counter-button">
        <svg xmlns="http://www.w3.org/2000/svg" class="block" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l14 0"></path>
        </svg>
    </button>
    {{-- Input field --}}
    <div class="w-8 text-center @error($wiremodel) !text-red-500 @enderror">
        <span wire:loading.class="opacity-30" wire:target="{{ $wiretarget }}" x-text="value" class="h-[36px]">
    </div>
    {{-- Addition button --}}
    <button wire:loading.attr="disabled" wire:target="{{ $wiretarget }}" x-on:click="add()" x-bind:disabled="addDisabled" type="button" class="input-counter-button">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
        </svg>
    </button>
</div>
@if ($desc || $errors->first($wiremodel))
    <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
        {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
    </span>
@endif
