@if ($label)
    <span class="input-label">{{ $label }}</span>
@endif
<input wire:model="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" type="{{ $type }}" name="{{ $wiremodel }}" id="{{ $wiremodel }}" class="input-text {{ $class }}">
@if ($desc)
    <span class="input-desc">{{ $desc }}</span>
@endif
