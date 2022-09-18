<div class="flex space-x-5">
    <div class="flex items-center justify-center w-full">
        <div wire:loading wire:target="approve">
            <x-spinner size="10" />
        </div>
        <div wire:loading.remove wire:target="approve" class="w-full">
            <button wire:click="approve" class="button button-green">Approve</button>
        </div>
    </div>
    <div class="w-full">
        <button class="button button-red">Reject</button>
    </div>
</div>
