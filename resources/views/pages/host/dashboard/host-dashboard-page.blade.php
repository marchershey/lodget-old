<x-layouts.host>

    <form wire:submit.="testToast">
        <button type="submit" class="button">asdf</button>
    </form>

</x-layouts.host>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Toast.success('A toast without a title also works');
        });
    </script>
@endpush
