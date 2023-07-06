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
                    @foreach ($systems as $key => $system)
                        <option value="{{ $key }}">{{ $system }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="col-span-6 {{ $super == true ? 'sm:col-span-3' : 'sm:col-span-5' }}">
            <input class=" border  text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-6" wire:model="search" label="Search" placeholder="{{__('super.Search Users...')}}"/>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
     
        <table class="min-w-full divide-y divide-slate-200 ">
            <!-- Table header -->
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">E-mail</th>
                    
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('locker.Locker name')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('box.Boxes')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('plan.Plan')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('rental.Valid from')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('rental.Booked until')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('rental.Price')}}</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">Pincode</th>
                  
                    <!-- Add more table columns as needed -->
                </tr>
            </thead>
            
            <!-- Table body -->
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($rentals as $rental)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      
    
                            {{ $rental->user->name  ?? 'ANONYME PERSON' }}
                      
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $rental->user->email  ?? 'ANONYME PERSON' }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $rental->system->system_name ?? 'Error' }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $rental->box->number ?? 'Error' }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap ">
                      
    
                            {{ $rental->duration }}
                       
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $rental->start_time }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap ">
                       
    
                            {{ $rental->end_time }}
                     
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      
                            
                            {{ $rental->price }}
                       
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      
                            
                        {{ $rental->pincode }}
                   
                </td>
                   
                    <!-- Add more table cells for other rental attributes -->
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $rentals->links() }} 
    </div>
    <div>
      
    </div>
</div>
