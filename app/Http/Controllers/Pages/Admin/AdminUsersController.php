<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Usernotnull\Toast\Concerns\WireToast;

class AdminUsersController extends Component
{
    use WireToast, WithPagination;

    // Filters
    public $query;
    public $role = 'all';

    public function mount()
    {
        $this->reset();
    }


    public function render()
    {
        // Number of items per page
        $usersPerPage = 5;

        // Default role
        $roles = ['all' => 'All'];

        // Load all roles
        foreach (Role::all() as $role) {
            $roles[$role->name] = ucFirst(Str::plural($role->name));
        }

        if ($this->role == 'all') {
            $usersQuery = User::where('id', 'like', '%' . $this->query . '%')
                ->orWhere('first_name', 'like', '%' . $this->query . '%')
                ->orWhere('last_name', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%')
                ->orWhere('phone', 'like', '%' . $this->query . '%')
                ->paginate($usersPerPage);
        } else {
            $usersQuery = User::where('id', 'like', '%' . $this->query . '%')
                ->orWhere('first_name', 'like', '%' . $this->query . '%')
                ->orWhere('last_name', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%')
                ->orWhere('phone', 'like', '%' . $this->query . '%')
                ->role($this->role)->paginate($usersPerPage);
        }

        return view('pages.admin.admin-users', [
            'users' => $usersQuery,
            'roles' => $roles,
        ]);
    }

    public function updated()
    {
        $this->resetPage();
    }
}
