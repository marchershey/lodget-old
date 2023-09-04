<div>
    @if ($label)
        <div class="flex items-end justify-between">
            <span class="input-label @error($wiremodel) !text-red-500 @enderror">{{ $label }}</span>
        </div>
    @endif
    <select wire:model.blur="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" name="{{ $label }}" id="{{ $wiremodel }}" class="input-select @error($wiremodel) !ring-red-500 @enderror">
        <option></option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @if ($desc || $errors->first($wiremodel))
        <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
            {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
        </span>
    @endif
</div>
