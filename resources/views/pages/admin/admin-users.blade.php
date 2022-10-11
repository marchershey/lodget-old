<x-layouts.admin class="container-lg">
    <div class="padding spacing">
        <div>
            <h1 class="page-heading">Users</h1>
            <p class="page-desc">Add, edit, and delete users from this page</p>
        </div>

        <div class="grid content-end grid-cols-2 gap-5 tablet:grid-cols-4">
            <div class="col-span-full tablet:col-span-2">
                <x-forms.text class="!input-light placeholder-gray-300 placeholder:font-normal" label="Search" placeholder="Type your search query here..." model="query" modelType="debounce.500ms" />
            </div>
            <div class="">
                <x-forms.select class="!input-light" label="Roles" model="role" :options="$roles" />
            </div>
            <div class="flex items-center self-end">
                <label for=""></label>
                <button class="button button-dark button-full">Add User</button>
            </div>
        </div>

        <div class="table-container">
            <table class="table">
                <thead class="bg-gray-100">
                    <tr>
                        <td>User</td>
                        <td>Role</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="font-semibold">{{ $user->first_name }} {{ $user->last_name }}</div>
                                    <div class="text-sm">{{ $user->email }}</div>
                                </td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        @foreach ($user->roles as $role)
                                            <span class="text-sm capitalize">{{ $role['name'] }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center justify-end">
                                        <button class="button button-light button-sm">Edit</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">
                                <div class="text-center">No users found.</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="">
            {{ $users->links() }}

        </div>
    </div>

</x-layouts.admin>
