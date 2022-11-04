<div class="panel padding spacing" x-data="adminSettingsPropertiesAmenities" wire:init="load">
    <div>
        <h2 class="panel-heading">Default Amenities</h2>
        <span class="panel-desc">Add or remove Property Amenities, and select which amenities are visibile on the host setup page.</span>
    </div>
    <div>
        <div class="flex space-x-4">
            <button x-cloak x-show="!createGroupForm" x-on:click="showCreateGroupForm()" class="button-full button-light button">Add New Amenities Group</button>
        </div>
        <form @submit.prevent="submitCreateGroup" x-cloak x-show="createGroupForm">
            <div class="flex p-4 space-x-4 border rounded bg-gray-50">
                <div class="w-full">
                    <x-forms.text label="Group Name" model="new_group_name" class="input-sm input-light" />
                </div>
                <div class="mt-7">
                    <button type="submit" class="button-sm button-white button">Create</button>
                </div>
            </div>
        </form>
    </div>

    @if ($groups && count($groups) > 0)
        <form @submit.prevent="submitCreateAmenity">
            <div class="panel panel-dark padding-sm spacing">
                <div class="flex items-center justify-between">
                    <div>
                        <x-forms.text label="Amenity Name" model="new_amenity.name" class="input-light" />
                    </div>
                    <div>
                        <x-forms.select label="Group" model="new_amenity.group_id" :options="$formatted_groups" class="input-light" />
                    </div>
                    <div class="mt-7">
                        <label for="checkbox" class="flex space-x-5">
                            <span>Set as primary amenity</span>
                            <input wire:model="new_amenity.primary" type="checkbox" id="checkbox" class="checkbox">
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full button button-white">Create Amenity</button>
                </div>
            </div>
        </form>

        <div class="divide-y table-container-in-panel max-h-96">
            @foreach ($groups as $group)
                <div class="relative">
                    <div class="sticky top-0 px-4 py-2 border-b bg-gray-50">
                        <div class="flex items-center justify-between space-x-4">
                            <div class="title">{{ $group->name }}</div>
                            <div class="flex items-center space-x-2 whitespace-nowrap">
                                <button x-on:click="showEditGroupModal({{ $group->id }})" class="button button-xs button-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                </button>
                                <button x-on:click="submitDeleteGroup({{ $group->id }})" class="button button-xs button-red">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table divide-y">
                        @foreach ($group->amenities as $amenity)
                            <div class="grid grid-cols-3 gap-8 p-4 hover:bg-gray-50">
                                <div class="truncate">
                                    {{ $amenity->name }}
                                </div>
                                <div>
                                    @if ($amenity->primary)
                                        Primary Amenity
                                    @endif
                                </div>
                                <div class="flex items-center justify-end space-x-2">
                                    <button x-on:click="showEditAmenityModal({{ $amenity->id }})" class="button button-xs button-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                    </button>
                                    <button x-on:click="sumbitDeleteAmenity({{ $amenity->id }})" class="button button-xs button-red">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Edit Amenity Group Modal --}}
    <div x-show="editGroupModal">
        <x-modal showFunction="editGroupModal" closeFunction="hideEditGroupModal()">
            <form @submit.prevent="submitEditGroup">
                <div wire:loading.remove wire:target="initUpdateGroup" class="flex flex-col space-y-4">
                    <div>
                        Update the <span class="font-semibold">{{ $active_group['name'] ?? '' }}</span> amenity group...
                    </div>
                    <div>
                        <x-forms.text label="" model="updated_group_name" placeholder="{{ $active_group['name'] ?? '' }}" class="placeholder-gray-300" />
                    </div>
                    <div class="flex space-x-4">
                        <button x-on:click="cancelEditGroup" type="button" class="button button-sm button-link">Cancel</button>
                        <button type="submit" class="button button-sm button-light button-full">Update</button>
                    </div>
                </div>
                <div wire:loading wire:target="initUpdateGroup">
                    Loading...
                </div>
            </form>
        </x-modal>
    </div>

    {{-- Edit Amenity Modal --}}
    <div x-show="editAmenityNameModal">
        <x-modal showFunction="editAmenityNameModal" closeFunction="hideEditAmenityModal()">
            <form @submit.prevent="submitEditAmenity">
                <div wire:loading.remove wire:target="initUpdateAmenity" class="flex flex-col space-y-4">
                    <div>
                        <x-forms.text label="Amenity Name" model="updated_amenity.name" placeholder="{{ $active_amenity['name'] ?? '' }}" class="placeholder-gray-300" />
                    </div>
                    <div>
                        <x-forms.select label="Group" model="updated_amenity.group_id" :options="$formatted_groups ?? []" class="" />
                    </div>
                    <div>
                        <label for="updated_amenity_primary_checkbox" class="relative flex items-start py-4">
                            <div class="flex-1 min-w-0 text-sm">
                                <div for="person-3" class="ml-0 checkbox-label">Set as primary amenity</div>
                            </div>
                            <div class="flex items-center h-5 ml-3">
                                <input wire:model="updated_amenity.primary" type="checkbox" id="updated_amenity_primary_checkbox" class="checkbox">
                            </div>
                        </label>
                    </div>
                    <div class="flex space-x-4">
                        <button x-on:click="cancelEditAmenity" type="button" class="button button-sm button-link">Cancel</button>
                        <button type="submit" class="button button-sm button-light button-full">Update</button>
                    </div>
                </div>
                <div wire:loading wire:target="initUpdateAmenity">
                    Loading...
                </div>
            </form>
        </x-modal>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('adminSettingsPropertiesAmenities', () => ({
                /* Amenity Groups */
                createGroupForm: false,
                editGroupModal: false,
                showCreateGroupForm() {
                    this.createGroupForm = true
                },
                hideCreateGroupForm() {
                    this.createGroupForm = false
                },
                showEditGroupModal(group_id) {
                    @this.initUpdateGroup(group_id)
                    this.editGroupModal = true
                },
                hideEditGroupModal() {
                    this.editGroupModal = false
                },
                submitCreateGroup() {
                    @this.createGroup()
                },
                async submitEditGroup() {
                    var status = await @this.updateGroup()

                    if (status) {
                        this.hideEditGroupModal()
                    }
                },
                submitDeleteGroup(group_id) {
                    @this.deleteGroup(group_id)
                },


                /* Amenities */
                editAmenityNameModal: false,
                showEditAmenityModal(amenity_id) {
                    @this.initUpdateAmenity(amenity_id);
                    this.editAmenityNameModal = true;
                },
                hideEditAmenityModal() {
                    this.editAmenityNameModal = false;
                },
                submitCreateAmenity() {
                    @this.createAmenity()
                },
                cancelEditAmenity() {
                    this.hideEditAmenityModal();
                },
                async submitEditAmenity() {
                    var status = await @this.updateAmenity()

                    if (status) {
                        this.hideEditAmenityModal()
                    }
                },
                sumbitDeleteAmenity(amenity_id) {
                    @this.deleteAmenity(amenity_id);
                }









            }))
        })
    </script>
@endpush
