<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="{{__('admin.Search Rentals...')}}" class="border border-gray-300 rounded px-4 py-2 mb-4">
      <!-- Add Export Button -->
      <div class="mb-4">
        <button wire:click="exportToExcel" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Export nach Excel
        </button>
    </div>

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
                    {{ \Carbon\Carbon::parse($rental->start_time)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap ">
                   

                    {{ \Carbon\Carbon::parse($rental->end_time)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                 
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
    <div class="mt-4">
        {{ $rentals->links() }} <!-- Display the pagination links -->
    </div>
</div>
