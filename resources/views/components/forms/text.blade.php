<div>
    @if ($label)
        <label for="{{ $id }}" class="input-label @error($model) text-red-500 @enderror">{{ $label }}</label>
    @endif
    <input wire:model{{ $modelType }}="{{ $model }}" wire:loading.delay.attr="disabled" id="{{ $id }}" type="text" {{ $attributes->class(['input input-dark pr-10 placeholder-gray-400']) }} autocomplete="{{ $id }}">
    @if ($desc || $errors->first($model))
        <div class="input-desc @error($model) text-red-500 @enderror">
            {{ empty($errors->first($model)) ? $desc : $errors->first($model) }}
        </div>
    @endif
</div>
