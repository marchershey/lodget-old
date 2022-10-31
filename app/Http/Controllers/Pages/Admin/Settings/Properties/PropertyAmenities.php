<?php

namespace App\Http\Controllers\Pages\Admin\Settings\Properties;

use App\Models\PropertyAmenity;
use App\Models\PropertyAmenityGroup;
use Livewire\Component;
use Throwable;
use Usernotnull\Toast\Concerns\WireToast;

class PropertyAmenities extends Component
{
    use WireToast;

    public $amenity_groups;
    public $new_amenity_group_name;
    public $edit_amenity_group_name;

    public function render()
    {
        return view('pages.admin.settings.properties.property-amenities');
    }

    public function load()
    {
        $this->amenity_groups = PropertyAmenityGroup::all();
    }

    public function createGroup()
    {
        if (!PropertyAmenityGroup::where('name', $this->new_amenity_group_name)->exists()) {
            $property_amenity_group = new PropertyAmenityGroup();
            $property_amenity_group->name = $this->new_amenity_group_name;
            try {
                $property_amenity_group->save();
                $this->new_amenity_group_name = "";
            } catch (Throwable $e) {
                toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
            }
            toast()->success('You\'ve created a new amenity group', 'Success!')->push();
            $this->load();
        } else {
            toast()->warning('That amenity group already exists...', 'Whoops.')->push();
            $this->new_amenity_group_name = "";
        }
    }

    public function deleteGroup($group_id)
    {
        $group = PropertyAmenityGroup::find($group_id);
        $group->delete();

        $this->load();
    }
}
