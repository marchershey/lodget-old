@if ($label)
    <span class="input-label">{{ $label }}</span>
@endif
<select wire:model="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" name="{{ $label }}" id="{{ $wiremodel }}" class="input-select">
    <option></option>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
@if ($desc)
    <span class="input-desc">{{ $desc }}</span>
@endif
