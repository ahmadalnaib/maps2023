 <x-admin>

  <div class="container mx-auto">
   
    <h1 class="text-4xl font-bold my-6">Purchases</h1>
    <p class="text-2xl font-light text-gray-400 my-6">Here you'll find all your purchased Lockers.</p>

    @if (count($rentals) > 0)
    <div class="grid grid-cols-2 gap-4">
        @foreach ($rentals as $rental)
        <div class="bg-green-200 p-4 rounded shadow">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="font-bold text-2xl">{{ $rental->system->name}}</span>
               
                </div>
                <span class="font-bold text-2xl">{{ $rental->price }}</span>
            </div>
            <div class="mt-4" id="rental-details-{{ $rental->id }}" style="display: none;">
              <table class="w-full bg-green-100 rounded-lg">
                  <tr>
                      <td class="p-2 font-semibold">Username:</td>
                      <td class="p-2">{{ $rental->user->name }}</td>
                  </tr>
                 
                  <tr>
                      <td class="p-2 font-semibold">System Name:</td>
                      <td class="p-2">{{$rental->system->name}}</td>
                  </tr>
                  <tr>
                    <td class="p-2 font-semibold">System Address:</td>
                    <td class="p-2">{{$rental->system->place->address}}</td>
                </tr>
                  <tr>
                      <td class="p-2 font-semibold">Box Number:</td>
                      <td class="p-2">{{$rental->box->number}}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Plan Name:</td>
                      <td class="p-2">{{ $rental->duration }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Price:</td>
                      <td class="p-2">{{ $rental->price }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Valid from:</td>
                      <td class="p-2">{{ $rental->start_time }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Valid until:</td>
                      <td class="p-2">{{ $rental->end_time }}</td>
                  </tr>
              </table>
          </div>
          
            <div class="flex justify-end mt-6">
                <button class="text-blue-500 hover:underline" onclick="toggleRentalDetails({{ $rental->id }})">
                    Show Details
                </button>
                <a href="{{route('invoices.generate',$rental)}}" class="ml-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-blue-600" >
                  Generate Invoice
              </a>
              
              
            </div>
            <span class="text-gray-500 ml-2"> {{ $rental->created_at->diffForHumans() }}</span>
        </div>
        
        @endforeach
    </div>
    @else
    <p class="text-gray-500 italic">You have no orders at the moment.</p>
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