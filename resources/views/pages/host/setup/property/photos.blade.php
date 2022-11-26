<div class="spacing" x-data="hostSetupPropertyPhotos" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Upload Photos</h2>
            <p class="panel-desc">Let's show off your property by adding some photos.</p>
        </div>

        <div class="flex flex-col items-center group">
            <label for="photos" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 @error('photos') border-red-500 bg-red-50 @enderror">
                <div class="flex flex-col items-center justify-center padding">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-muted-light" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M15 8h.01"></path>
                            <path d="M12 20h-5a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v5"></path>
                            <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l4 4"></path>
                            <path d="M14 14l1 -1c.617 -.593 1.328 -.793 2.009 -.598"></path>
                            <path d="M19 22v-6"></path>
                            <path d="M22 19l-3 -3l-3 3"></path>
                        </svg>
                    </div>
                    <div class="text-sm"><span class="font-semibold">Select photos to upload</div>
                    <div class="text-xs text-muted">or drag and drop them here</div>
                    <div class="mt-3 text-xs text-muted-light">JPG, JPEG, PNG, GIF, or SVG - 20MB max</div>
                </div>
                <input wire:model="photos" id="photos" type="file" class="hidden" accept="image/jpg, image/jpeg, image/png, image/gif" multiple />
                {{-- <input wire:model="photos" id="photos" type="file" class="hidden" multiple /> --}}
            </label>
            @error('photos')
                <div class="w-full mt-5 text-left">
                    <span class="text-sm text-red-500">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div x-show="isUploading">
            <div class="flex items-center justify-between mb-1">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 animate-spin text-muted-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-50" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <div class="text-sm font-medium">Uploading...</div>
                </div>
                <div class="text-sm font-medium" x-text="progress + '%'"></div>
            </div>
            <div class="w-full bg-gray-200 rounded h-3.5">
                <div class="bg-blue-600 h-3.5 rounded w-0" :style="{ width: progress + '%' }"></div>
            </div>
        </div>

        @if ($photos)
            <div class="spacing-sm">
                <div>
                    <h3 class="leading-none title">Photos</h3>
                    <span class="subtitle">Total Size: {{ $size }} MB</span>
                </div>

                <ul role="list" class="grid grid-cols-2 tablet:grid-cols-3 gap">
                    @foreach ($photos as $photo_key => $photo)
                        <li class="relative group">
                            <button wire:click="deletePhoto({{ $photo_key }})" class="absolute top-0 right-0 z-10 hidden cursor-pointer group-hover:block">
                                <div class="p-2 bg-white rounded-bl-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </div>
                            </button>
                            <div class="block w-full overflow-hidden bg-gray-100 rounded-lg shadow-xl aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-black focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <img src="{{ $photo->temporaryUrl() }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            </div>
                            <p class="block mt-2 text-sm font-medium text-gray-900 truncate pointer-events-none @error('photos.' . $photo_key) text-red-500 @enderror">{{ $photo->getClientOriginalName() }}</p>
                            <p class="block text-xs font-medium text-gray-500 pointer-events-none">{{ round($photo->getSize() / 1024, 2) }} MB</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    {{-- <div>
        @error('photos')
            <span class="error">Photos: {{ $message }}</span>
        @enderror
        @error('photos.*')
            <span class="error">Photos.*: {{ $message }}</span>
        @enderror
        @error('photos[5]')
            <span class="error">Photos 5 error: {{ $message }}</span>
        @enderror
    </div> --}}

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('hostSetupPropertyPhotos', () => ({
                isUploading: false,
                progress: "0",
            }))
        })
    </script>
@endpush
