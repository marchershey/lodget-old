<div x-data="{ text: @entangle($wiremodel), count() { return this.text.length } }">
    <div class="flex items-end justify-between">
        @if ($label)
            <span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
        @endif
        @if ($max)
            <div class="text-xs text-muted">
                <span x-text="count">0</span>
                <span>/</span>
                <span>{{ $max }}</span>
            </div>
        @endif
    </div>
    <input x-model="text" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" type="{{ $type }}" name="{{ $wiremodel }}" id="{{ $wiremodel }}" class="input-text @if ($max) pr-14 @endif {{ $class }} @error($wiremodel) !ring-red-500 @enderror">
    @if ($desc || $errors->first($wiremodel))
        <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
            {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
        </span>
    @endif
</div>
