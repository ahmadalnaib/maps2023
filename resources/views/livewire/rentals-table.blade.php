<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="{{__('admin.Search Rentals...')}}" class="border border-gray-300 rounded px-4 py-2 mb-4">
      <!-- Add Export Button -->
      <div class="mb-4">
        <button wire:click="exportToExcel" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Export nach Excel
        </button>
    </div>

    <div x-data="{ openRental: null }">
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
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-indigo-500 uppercase tracking-wider">{{__('rental.Additional Rental')}}</th>
              
              
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
              
                <td class="px-6 py-4 whitespace-no-wrap ">
                    @if($additionalRentals->where('rental_uuid', $rental->uuid)->count() > 0)
                    <button @click="openRental === '{{ $rental->uuid }}' ? openRental = null : openRental = '{{ $rental->uuid }}'" class="text-indigo-600 hover:text-indigo-900 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                          </svg>
                          
                    </button>
                    @endif
                </td>
            </tr>
            <tr x-show="openRental === '{{ $rental->uuid }}'">
                <td colspan="10">
                    <div class="p-4 bg-white border border-gray-300 overflow-y-auto h-[200px]">
                        <table class="min-w-full ">
                            <thead>
                                <tr>
                                    
                                   
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">E-mail</th>
                                        
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('locker.Locker name')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('box.Boxes')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('plan.Plan')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('rental.Valid from')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('rental.Booked until')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('rental.Price')}}</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">Pincode</th>
                                        <th class="px-6 py-3 bg-green-100 text-left text-xs leading-4 font-medium text-green-600 uppercase tracking-wider">{{__('rental.Booking time')}}</th>
                                     
                                      
                                        <!-- Add more table columns as needed -->
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($additionalRentals->where('rental_uuid', $rental->uuid) as $additionalRental)
                                    <tr>
                                       
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap">
                                              
                            
                                                    {{ $rental->user->name  ?? 'ANONYME PERSON' }}
                                              
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap">
                                                {{ $rental->user->email  ?? 'ANONYME PERSON' }}
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap">
                                                {{ $rental->system->system_name ?? 'Error' }}
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap">
                                                {{ $rental->box->number ?? 'Error' }}
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap ">
                                              
                            
                                                    {{ $rental->duration }}
                                               
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap">
                                                {{ \Carbon\Carbon::parse($rental->start_time)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap ">
                                               
                                                  <span class="text-green-400  p-1">

                                                      {{ \Carbon\Carbon::parse($additionalRental->end_time)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                                                  </span>
                                             
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap ">
                                              
                                                    
                                              <span class="text-green-400  p-1">{{ $additionalRental->price }}</span>
                                               
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap ">
                                              
                                                    
                                                    {{ $rental->pincode }}
                                               
                                            </td>
                                            <td class="border-b border-green-300 px-6 py-4 whitespace-no-wrap ">
                                              
                                                <span class="text-green-400  p-1 ">

                                                    {{ \Carbon\Carbon::parse($additionalRental->datetime)->tz('Europe/Berlin')->format('Y-m-d H:i:s') }}
                                                </span>
                                               
                                            </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
                        
                    </div>
                </td>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="mt-4">
        {{ $rentals->links() }} <!-- Display the pagination links -->
    </div>
</div>


{{-- 
    <script>
        function toggleDetails(uuid) {
            document.getElementById(`details-${uuid}`).classList.toggle('hidden');
        }

        function showDetails(uuid) {
            return !document.getElementById(`details-${uuid}`).classList.contains('hidden');
        }
    </script> --}}
