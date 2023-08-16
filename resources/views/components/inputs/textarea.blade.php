@if ($label)
    <span class="input-label">{{ $label }}</span>
@endif
<textarea wire:model="{{ $wiremodel }}" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" class="input-textarea" name="{{ $label }}" id="{{ $wiremodel }}" rows="{{ $rows }}"></textarea>
@if ($desc)
    <span class="input-desc">{{ $desc }}</span>
@endif
