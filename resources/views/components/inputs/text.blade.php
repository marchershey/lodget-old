@if ($label)
    <span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
@endif
<input wire:model.lazy="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" type="{{ $type }}" name="{{ $wiremodel }}" id="{{ $wiremodel }}" class="input-text {{ $class }} @error($wiremodel) !ring-red-500 @enderror">
@if ($desc || $errors->first($wiremodel))
    <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
        {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
    </span>
@endif
