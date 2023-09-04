<div x-data="{ text: @entangle($wiremodel).live, count() { return this.text.length } }">
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
    <textarea x-model="text" wire:target="{{ $wiretarget }}" wire:loading.attr="disabled" class="input-textarea @error($wiremodel) !ring-red-500 @enderror" name="{{ $label }}" id="{{ $wiremodel }}" rows="{{ $rows }}"></textarea>
    @if ($desc || $errors->first($wiremodel))
        <span class="input-desc @error($wiremodel) !text-red-500 @enderror">
            {{ empty($errors->first($wiremodel)) ? $desc : $errors->first($wiremodel) }}
        </span>
    @endif
</div>
