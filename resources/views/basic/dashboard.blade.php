<x-admin>

  <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-6">My Orders</h1>

    @if (count($rentals) > 0)
    <div class="grid grid-cols-2 gap-4">
        @foreach ($rentals as $rental)
        <div class="bg-white p-4 rounded shadow">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="font-bold text-2xl">{{ $rental->duration }}</span>
                    {{-- <span class="text-gray-500 ml-2">By {{ $rental->seller }}</span> --}}
                </div>
                <span class="font-bold text-2xl">{{ $rental->price }}</span>
            </div>
            <div class="mt-4" id="rental-details-{{ $rental->id }}" style="display: none;">
              <table class="w-full bg-gray-100 rounded-lg">
                  <tr>
                      <td class="p-2 font-semibold">Tenant ID:</td>
                      <td class="p-2">{{ $rental->tenant_id }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">User ID:</td>
                      <td class="p-2">{{ $rental->user_id }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Locker ID:</td>
                      <td class="p-2">{{ $rental->locker_id }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Door ID:</td>
                      <td class="p-2">{{ $rental->door_id }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Plan ID:</td>
                      <td class="p-2">{{ $rental->plan_id }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">Start Time:</td>
                      <td class="p-2">{{ $rental->start_time }}</td>
                  </tr>
                  <tr>
                      <td class="p-2 font-semibold">End Time:</td>
                      <td class="p-2">{{ $rental->end_time }}</td>
                  </tr>
              </table>
          </div>
          
            <div class="flex justify-end mt-6">
                <button class="text-blue-500 hover:underline" onclick="toggleRentalDetails({{ $rental->id }})">
                    Show Details
                </button>
                <a href="{{route('invoices.generate',$rental)}}" class="ml-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-blue-600" >
                  Generate Invoice
              </a>
              
              
            </div>
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

  function generateInvoice(rentalId) {
      // Logic to generate invoice for the rental with the given ID
      // You can implement this functionality according to your requirements
      console.log(`Generating invoice for rental with ID ${rentalId}`);
  }
</script>

</x-admin>
