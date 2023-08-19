@if ($label)
    <span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
@endif
<div class="relative" x-data="{ text: @entangle($wiremodel), count() { return this.text.length } }">
    <input wire:model.lazy="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" type="{{ $type }}" name="{{ $wiremodel }}" id="{{ $wiremodel }}" class="input-text @if ($max) pr-14 @endif {{ $class }} @error($wiremodel) !ring-red-500 @enderror">
    {{-- <input x-model="text" wire:model.lazy="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" type="{{ $type }}" name="{{ $wiremodel }}" id="{{ $wiremodel }}" class="input-text {{ $class }} @error($wiremodel) !ring-red-500 @enderror"> --}}
    @if ($max)
        <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5 items-center">
            <div class="text-xs text-muted">
                <span x-text="count"></span> / {{ $max }}
            </div>
        </div>
    @endif
</div>
@if ($desc || $errors->first($wiremodel))
    <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
        {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
    </span>
@endif
