<x-admin>

    <x-slot name="header" >
       
        <div class="bg-indigo-500 border-t border-b border-blue-500 text-white px-4 py-3 rounded" role="alert">
            <a href="https://www.lockport.online/de" class="font-bold">{{__('rental.Neues Fach buchen')}}	<span class="font-bold">&#8594</span> </a>
        
          </div>
    </x-slot>
    <div class="container mx-auto">
     
      <h1 class="text-4xl font-bold my-6">{{__('basic.Purchases')}}</h1>
      <p class="text-2xl font-light text-gray-400 my-6">{{__("basic.Here you'll find all your purchased Lockers.")}}</p>
  
      @if (count($rentals) > 0)
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach ($rentals as $rental)
          <div class="bg-green-200 p-4 rounded shadow">
              <div class="flex items-center justify-between">
                  <div class="flex items-center">
                      <span class="font-bold text-2xl">{{ $rental->system->system_name}}</span>
                 
                  </div>
                  <span class="font-bold text-2xl">{{ $rental->price }}</span>
              </div>
              <div class="mt-4" id="rental-details-{{ $rental->id }}" style="display: none;">
                <table class="w-full bg-green-100 rounded-lg">

                    <tr>
                        <td class="p-2 font-semibold">{{__('basic.Pincode:')}}</td>
                        <td class="p-2">{{ $rental->pincode }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('basic.Username:')}}</td>
                        <td class="p-2">{{ $rental->user->name }}</td>
                    </tr>
                   
                    <tr>
                        <td class="p-2 font-semibold">{{__('basic.System Name:')}}</td>
                        <td class="p-2">{{$rental->system->system_name}}</td>
                    </tr>
                    <tr>
                      <td class="p-2 font-semibold">{{__('basic.System Address:')}}</td>
                      <td class="p-2">{{$rental->system->place->address}}</td>
                  </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('basic.Box Number:')}}</td>
                        <td class="p-2">{{$rental->box->number}}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('rental.Rental period')}}:</td>
                        <td class="p-2">{{ $rental->duration }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('rental.Price')}}:</td>
                        <td class="p-2">{{ $rental->price }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('rental.Valid from')}}</td>
                        <td class="p-2">{{ $rental->start_time }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{__('rental.Booked until')}}</td>
                        <td class="p-2">{{ $rental->end_time }}</td>
                    </tr>
                </table>
            </div>
            
              <div class="flex justify-end mt-6">
                  <button class="text-blue-500 hover:underline" onclick="toggleRentalDetails({{ $rental->id }})">
                 {{__('basic.Show Details')}}
                  </button>
                  <a href="{{route('invoices.generate',$rental)}}" class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-blue-600" >
                 {{__('basic.Generate Invoice')}}
                </a>
                
                
              </div>
              <span class="text-gray-500 ml-2"> {{ $rental->created_at->diffForHumans() }}</span>
          </div>
          
          @endforeach
      </div>
      @else
      <p class="text-gray-500 italic">{{__('basic.You have no orders at the moment.')}}</p>
      @endif
  </div>
  <script>
    function toggleRentalDetails(rentalId) {
        const detailsElement = document.getElementById(`rental-details-${rentalId}`);
        const buttonElement = document.getElementById(`rental-details-button-${rentalId}`);
        if (detailsElement.style.display === 'none') {
            detailsElement.style.display = 'block';
            buttonElement.innerText = 'Hide Details';
        } else {
            detailsElement.style.display = 'none';
            buttonElement.innerText = 'Show Details';
        }
    }
  </script>
  
  </x-admin>
  