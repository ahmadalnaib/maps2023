<div>
    <div class="grid grid-cols-6 mb-4">
        <div class="col-span-6 sm:col-span-1 pr-2">
            <label for="location" class="block text-sm leading-5 font-medium text-gray-700">Per Page</label>
            <select wire:model="perPage" id="location"
                class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
        </div>

        @if ($super)
            <div class="col-span-6 sm:col-span-2 pr-2">
                <label for="tenant" class="block text-sm leading-5 font-medium text-gray-700">Tenant</label>
                <select wire:model="selectedTenant" id="tenant"
                    class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option value="">Choose a Tenant</option>
                    @foreach ($tenants as $key => $tenant)
                        <option value="{{ $key }}">{{ $tenant }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="col-span-6 {{ $super == true ? 'sm:col-span-3' : 'sm:col-span-5' }}">
            {{-- <input wire:model="search" label="Search" placeholder="Search Users..."/> --}}
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        {{-- <tr>
                        <x-th label="Name" value="name" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                        <x-th label="Title" value="title" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                        <x-th label="Status" value="status" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
                        <x-th label="Role" value="role" :canSort="true" :sortField="$sortField" :sortAsc="$sortAsc" />
                        <x-th label="Application" value="application" :canSort="false" :sortField="$sortField" :sortAsc="$sortAsc" />
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                            <span class="flex rounded-md justify-end">
                                <a href="{{route('users.create')}}" type="button"
                                   class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                    Add Team Member
                                </a>
                            </span>
                        </th>
                    </tr> --}}
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr wire:key="{{ $user->id }}">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">

                                        </div>
                                        <div class="ml-4">
                                            <div>
                                                <span
                                                    class="text-sm leading-5 font-medium text-gray-900">{{ $user->name }}</span>
                                                @if ($super)
                                                    <a wire:click="impersonate({{ $user->id }})" href="#"
                                                        class="text-xs text-indigo-600 ml-1">Impersonate</a>
                                                @endif
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{-- <div class="text-sm leading-5 text-gray-900">{{$user->title}}</div>
                                <div class="text-sm leading-5 text-gray-500">{{$user->department}}</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{-- @if ($user->status)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif --}}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $user->role }}
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        {{ $users->links() }}
    </div>
</div>
