<div>
    <div class="grid grid-cols-6 mb-4">
        <div class="col-span-6 sm:col-span-1 pr-2">
            <label for="location" class="block text-sm leading-5 font-medium text-gray-700">{{__('super.Per Page')}}</label>
            <select wire:model="perPage" id="location"
                class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
        </div>

        @if ($super)
            <div class="col-span-6 sm:col-span-2 pr-2">
                <label for="tenant" class="block text-sm leading-5 font-medium text-gray-700">{{__('super.Users')}}</label>
                <select wire:model="selectedTenant" id="tenant"
                    class="mt-1 form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option value="">{{__('super.Choose a User')}}</option>
                    @foreach ($tenants as $key => $tenant)
                        <option value="{{ $key }}">{{ $tenant }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="col-span-6 {{ $super == true ? 'sm:col-span-3' : 'sm:col-span-5' }}">
            <input class=" border  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-6" wire:model="search" label="Search" placeholder="{{__('super.Search Users...')}}"/>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                      
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
                                                        class="text-xs text-indigo-600 ml-1">{{__('super.Impersonate')}}</a>
                                                @endif
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                   
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                 
                                </td>
                          @php
                                $roleColors = [
                                    'basic' => 'slate-500',
                                    'admin' => 'indigo-500',
                                    'super' => 'red-500',
                                ];
                                $defaultColor = 'gray-500';
                                $roleColor = $roleColors[$user->role] ?? $defaultColor;
                            @endphp
                                <td
                                    class="px-2 py-2 whitespace-no-wrap border-b border-gray-200 text-sm  rounded  text-{{ $roleColor }}"">
                                    {{ $user->role }}
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
