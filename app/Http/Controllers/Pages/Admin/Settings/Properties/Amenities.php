<?php

namespace App\Http\Controllers\Pages\Admin\Settings\Properties;

use App\Models\Amenity;
use App\Models\AmenityGroup;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Throwable;
use Usernotnull\Toast\Concerns\WireToast;

class Amenities extends Component
{
    use WireToast;

    // Amenity Groups
    public $groups;
    public $formatted_groups;
    public $active_group;
    public $new_group_name;
    public $updated_group_name;

    // Amenities
    public $active_amenity;
    public $new_amenity;
    public $updated_amenity;


    public function render()
    {
        return view('pages.admin.settings.properties.property-amenities');
    }

    public function load()
    {
        $this->groups = AmenityGroup::all();

        $this->new_amenity = [
            'name' => '',
            'group_id' => '',
            'primary' => false,
        ];

        foreach ($this->groups as $group) {
            $this->formatted_groups[$group->id] = $group->name;
        }
    }

    /**
     * Amenity Group
     */
    public function createGroup()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'new_group_name' => ['required', 'unique:amenity_groups,name', 'max:100'],
        ], [
            'new_group_name.unique' => 'That group name already exists',
        ], [
            'new_group_name' => 'Amenity Group Name',
        ]);

        try {
            $property_amenity_group = new AmenityGroup();
            $property_amenity_group->name = $this->new_group_name;
            $property_amenity_group->save();
            $this->new_group_name = "";
            toast()->success('You\'ve created a new amenity group', 'Success!')->push();
            $this->load();
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function deleteGroup($group_id)
    {
        try {
            $group = AmenityGroup::find($group_id);

            // Delete all amenities in this group
            foreach ($group->amenities as $amenity) {
                $amenity->delete();
            }

            $group->delete();

            toast()->success('Group successfully deleted!', 'Success!')->push();

            $this->load();
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function initUpdateGroup($group_id)
    {
        try {
            $this->active_group = AmenityGroup::find($group_id);
            $this->updated_group_name = "";
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function updateGroup()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'updated_group_name' => ['required', 'different:previous_group_name', 'unique:amenity_groups,name', 'max:100'],
        ], [
            'updated_group_name.different' => 'I thought you wanted to change the group name?',
            'updated_group_name.unique' => 'That group name already exists',
        ], [
            'updated_group_name' => 'group name',
        ]);

        try {
            $this->active_group->name = $this->updated_group_name;
            $this->active_group->save();
            toast()->success('Amenity Group Name has been updated!', 'Success!')->push();
            $this->load();
            return true;
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }

        return false;
    }

    /**
     * Amenities
     */
    public function createAmenity()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'new_amenity.name' => ['required', 'max:100',],
            'new_amenity.group_id' => ['required', 'exists:amenity_groups,id'],
            'new_amenity.primary' => ['nullable', 'boolean'],
        ], [
            'new_amenity.name.required' => 'Amenity name is required.',
            'new_amenity.name.max' => 'Amenity name is too long. (100 max characters)',
            'new_amenity.group_id.required' => 'Amenity group is required.',
        ]);


        try {
            $amenity = new Amenity();
            $amenity->name = $this->new_amenity['name'];
            $amenity->group_id = $this->new_amenity['group_id'];
            $amenity->primary = $this->new_amenity['primary'];
            $amenity->save();

            toast()->success('Amenity was added!', 'Success!')->push();

            $this->new_amenity['name'] = "";

            $this->load();
            // $amenity->show
        } catch (Throwable $th) {
            //throw $th;
            toast()->debug($th->getMessage())->push();
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function deleteAmenity($amenity_id)
    {
        try {
            $amenity = Amenity::find($amenity_id);
            $amenity->delete();

            $this->load();

            toast()->success('Amenity successfully deleted!', 'Success!')->push();
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function initUpdateAmenity($amenity_id)
    {
        try {
            $this->active_amenity = Amenity::find($amenity_id);
            $this->updated_amenity = [
                'name' => $this->active_amenity->name,
                'group_id' => $this->active_amenity->group_id,
                'primary' => $this->active_amenity->primary,
            ];
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
    public function updateAmenity()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'updated_amenity.name' => ['required', 'max:100',],
            'updated_amenity.group_id' => ['required', 'exists:amenity_groups,id'],
            'updated_amenity.primary' => ['nullable', 'boolean'],
        ], [
            'updated_amenity.name.required' => 'Amenity name is required.',
            'updated_amenity.name.max' => 'Amenity name is too long. (100 max characters)',
            'updated_amenity.group_id.required' => 'Amenity group is required.',
        ]);

        try {
            $this->active_amenity->name = $this->updated_amenity['name'];
            $this->active_amenity->group_id = $this->updated_amenity['group_id'];
            $this->active_amenity->primary = $this->updated_amenity['primary'];
            $this->active_amenity->save();
            toast()->success('Amenity Group Name has been updated!', 'Success!')->push();
            $this->load();
            return true;
        } catch (Throwable $e) {
            toast()->debug($e->getMessage())->push();
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }

        return false;
    }
}
