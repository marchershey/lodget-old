<div class="panel padding spacing" x-data="adminSettingsPropertiesAmenities" wire:init="load">
    <div>
        <h2 class="panel-heading">Default Amenities</h2>
        <span class="panel-desc">Add or remove Property Amenities, and select which amenities are visibile on the host setup page.</span>
    </div>
    <div>
        <div class="flex justify-end">
            <button x-cloak x-show="!showNewAmenityGroupForm" x-on:click="showNewAmenityGroupForm = true" class="button-full button-light button">Add New Amenities Group</button>
        </div>
        <form @submit.prevent="createNewAmenityGroup" x-cloak x-show="showNewAmenityGroupForm">
            <div class="flex items-center space-x-4 border rounded bg-gray-50 padding">
                <div class="w-full">
                    <x-forms.text label="Group Name" desc="Press enter to sumbit..." model="new_amenity_group_name" class="input-sm input-light" />
                </div>
                <div class="mt-2">
                    <button type="button" x-cloak x-show="showNewAmenityGroupForm" x-on:click="showNewAmenityGroupForm = false" class="button-sm button-white button">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    @if ($amenity_groups)
        <div class="divide-y table-container-in-panel max-h-96">
            @foreach ($amenity_groups as $group)
                <div class="relative">
                    <div class="sticky top-0 px-4 py-2 border-b bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="title">{{ $group->name }}</div>
                            <div class="flex items-center space-x-2">
                                <button x-on:click="editAmenityGroupName({{ $group->id }})" class="button button-xs button-white">Edit</button>
                                <button class="button button-xs button-red">Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="table">
                        @if (count($group->amenities) > 0)
                            @foreach ($group->amenities as $amenity)
                                <div class="grid grid-cols-3 gap-8 p-4">
                                    <div class="truncate">
                                        {{ $amenity->name }}
                                    </div>
                                    <div>
                                        this is a test
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-4 text-muted-light">
                                This group doesn't have any amenities.
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Edit Amenity Group Modal --}}
    <div x-show="showEditAmenityGroupNameModal">
        <x-modal alpineId="showEditAmenityGroupNameModal" title="a" />
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('adminSettingsPropertiesAmenities', () => ({
                showNewAmenityGroupForm: false,
                showEditAmenityGroupNameModal: false,
                createNewAmenityGroup() {
                    @this.createGroup();
                },
                editAmenityGroupName(id) {
                    this.showEditAmenityGroupNameModal = true;
                }
            }))
        })
    </script>
@endpush
