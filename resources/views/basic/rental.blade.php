<x-admin>

    <x-slot name="header" >
       
        {{-- <div class="bg-indigo-500 border-t border-b border-blue-500 text-white px-4 py-3 rounded" role="alert">
            <a href="{{route('home')}}" class="font-bold">{{__('rental.Neues Fach buchen')}}	<span class="font-bold">&#8594</span> </a>
        
          </div> --}}
          <section class="relative overflow-hidden md:py-6 md:px-6">
            <div class="relative flex flex-wrap max-w-4xl px-5 py-5 mx-auto overflow-hidden shadow-lg md:pr-0 sm:pr-11 md:px-3 md:py-3 bg-gradient-to-tr from-blue-600 md:rounded-lg to-indigo-600 sm:flex-nowrap sm:justify-center sm:items-center">
                <span class="absolute top-0 left-0 hidden w-32 h-32 -mt-16 -ml-20 rotate-45 opacity-50 md:block bg-gradient-to-r via-blue-400 to-transparent from-blue-400"></span>
                <div class="inline-flex flex-col order-1 w-11/12 max-w-screen-sm mb-2 text-sm text-white sm:order-none sm:w-auto sm:flex-row md:text-base sm:mb-0 sm:items-center">
                    <img class="w-8 h-8 mb-2 mr-2 sm:w-6 sm:h-6 sm:mb-0" src="https://cdn-icons-png.flaticon.com/512/1378/1378578.png">
                    <svg class="hidden w-8 h-8 mb-2 mr-2 sm:w-5 sm:h-5 sm:mb-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{__('rental.Neues Fach buchen')}}
                </div>
        
                <div class="relative order-last w-full sm:order-none sm:w-auto">
                    <a href="{{route('home')}}" class="relative inline-block w-full px-4 py-2 text-sm font-semibold text-center text-blue-600 transition duration-100 rounded-md outline-none sm:w-auto sm:ml-4 bg-blue-50 hover:bg-white active:bg-white focus-visible:ring ring-pink-300 whitespace-nowrap">&#8594</a>
                </div>
        
             
            </div>
        </section>
        
          
          
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
                        <td class="p-2 font-semibold">{{ __('reg.street') }}</td>
                        <td class="p-2">{{ $rental->user->street }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{ __('reg.street_number') }}</td>
                        <td class="p-2">{{ $rental->user->street_number }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{ __('reg.postcode') }}</td>
                        <td class="p-2">{{ $rental->user->postcode }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{ __('reg.city') }}</td>
                        <td class="p-2">{{ $rental->user->city }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-semibold">{{ __('reg.country') }}</td>
                        <td class="p-2">  {{ __('reg.Germany') }}</td>
                    </tr>
                   <hr>
              
                   
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
                  <a href="{{ route('rentals.extension', $rental->id) }}" class="ml-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-blue-600">
                    {{__('Rental Extension')}}
                </a>
              
                  <a href="{{route('invoices.generate',$rental)}}" class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" >
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
  