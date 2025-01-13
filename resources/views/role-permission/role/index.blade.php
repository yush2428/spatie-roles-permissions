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
                    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-3 bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="px-4 py-3 flex justify-between items-center bg-gray-100">
                        <h4 class="text-xl font-semibold">Roles</h4>
                        @can('create role')
                            <a href="{{ url('roles/create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded">Add Role</a>
                        @endcan
                    </div>
                    <div class="px-4 py-5">
                        <table class="table-auto w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border-b">Id</th>
                                    <th class="px-4 py-2 border-b">Name</th>
                                    <th class="px-4 py-2 border-b">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr class="odd:bg-gray-50 even:bg-white">
                                        <td class="px-4 py-2 border-b">{{ $role->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $role->name }}</td>
                                        <td class="px-4 py-2 border-b">
                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="bg-yellow-500 text-black hover:bg-yellow-700 px-4 py-2 rounded mr-2">
                                                Add / Edit Role Permission
                                            </a>

                                            @can('update role')
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="bg-green-500 text-white hover:bg-green-700 px-4 py-2 rounded">
                                                Edit
                                            </a>
                                            @endcan

                                            @can('delete role')
                                            <a href="{{ url('roles/'.$role->id.'/delete') }}" class="bg-red-500 text-white hover:bg-red-700 px-4 py-2 rounded mx-2">
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
