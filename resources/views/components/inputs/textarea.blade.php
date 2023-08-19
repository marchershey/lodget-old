@if ($label)
    <span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
@endif
<textarea wire:model.lazy="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" class="input-textarea @error($wiremodel) !ring-red-500 @enderror" name="{{ $label }}" id="{{ $wiremodel }}" rows="{{ $rows }}"></textarea>
@if ($desc || $errors->first($wiremodel))
    <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
        {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
    </span>
@endif
