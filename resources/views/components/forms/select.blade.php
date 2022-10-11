<div>
    <label for="{{ $id }}" class="input-label @error($model) text-red-500 @enderror">{{ $label }}</label>
    {{-- <input wire:model.lazy="{{ $model }}" wire:loading.delay.attr="disabled" id="{{ $id }}" type="text" class="capitalize input input-dark" autocomplete="{{ $id }}"> --}}

    <select wire:model.lazy="{{ $model }}" wire:loading.delay.attr="disabled" id="{{ $id }}" {{ $attributes->class(['capitalize input input-dark pr-10']) }} autocomplete="{{ $id }}">
        <option value="" hidden></option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @if ($desc || $errors->first($model))
        <div class="input-desc @error($model) text-red-500 @enderror">
            {{ empty($errors->first($model)) ? $desc : $errors->first($model) }}
        </div>
    @endif
</div>
