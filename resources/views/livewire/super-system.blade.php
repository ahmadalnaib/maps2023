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
                    @foreach ($users as $key => $user)
                        <option value="{{ $key }}">{{ $user }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="col-span-6 {{ $super == true ? 'sm:col-span-3' : 'sm:col-span-5' }}">
            <input class=" border  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-6" wire:model="search" label="Search" placeholder="{{__('super.Search Users...')}}"/>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
     
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                  {{__('super.systemname')}}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{__('super.systemteam')}}
                    </th>
                 
                   
                    <th scope="col" class="px-6 py-3">
                        {{__('locker.Last status')}}
                     </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($systems as $system)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$system->system_name}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$system->team->name}}
                    </th>
                 
                  
      
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($system->last_status)
                        {{ Carbon\Carbon::parse($system->last_status)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                    @else
                        <div></div>
                    @endif
                        </th>
                   
                 
                
                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $systems->links() }}
    </div>
</div>
