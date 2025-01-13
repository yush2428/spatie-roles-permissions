<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Management') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ url('users') }}" class="bg-yellow-500 text-white hover:bg-yellow-700 px-4 py-2 rounded">Users</a>
                <a href="{{ url('roles') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded">Roles</a>
                <a href="{{ url('permissions') }}" class="bg-teal-500 text-white hover:bg-teal-700 px-4 py-2 rounded">Permissions</a>
            </div>
        </div>
    </x-slot>

    <div class="container mt-2 border-2 border-red-500">
        <div class="w-full">
            <div class="w-full">

                @if (session('status'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-3 bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="px-4 py-3 flex justify-between items-center bg-gray-100">
                        <h4 class="text-lg font-semibold">Users</h4>
                        @can('create user')
                            <a href="{{ url('users/create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded">Add User</a>
                        @endcan
                    </div>
                    <div class="px-4 py-5">
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border-b-2 border-gray-300 px-4 py-2">Id</th>
                                    <th class="border-b-2 border-gray-300 px-4 py-2">Name</th>
                                    <th class="border-b-2 border-gray-300 px-4 py-2">Email</th>
                                    <th class="border-b-2 border-gray-300 px-4 py-2">Roles</th>
                                    <th class="border-b-2 border-gray-300 px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="odd:bg-gray-50 even:bg-white border-b border-gray-200">
                                    <td class="px-4 py-2">{{ $user->id }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label class="bg-blue-500 text-white mx-1 rounded-full px-2 py-1 text-sm">{{ $rolename }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @can('update user')
                                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="bg-green-500 text-white hover:bg-green-700 px-4 py-2 rounded">
                                            Edit
                                        </a>
                                        @endcan

                                        @can('delete user')
                                        <a href="{{ url('users/'.$user->id.'/delete') }}" class="bg-red-500 text-white hover:bg-red-700 px-4 py-2 rounded mx-2">
                                            Delete
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
