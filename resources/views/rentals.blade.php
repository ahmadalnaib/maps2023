<x-app-layout>
    <div class="container my-12 mx-auto md:px-12 p-5">
      
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
       
                <div class="px-4 py-5 sm:px-6">
                    <h4 class="mt-2 text-lg font-bold">Rental Details</h4>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Door Number
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                0 {{ $door->door_number }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Locker Name
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <p>Locker: {{ $locker->locker_name }}</p>
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Locker Adress
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <p>Locker: {{ $locker->address }}</p>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Start Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{-- {{ $rental->start_time }} --}}
                                {{ $start_time }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                End Date
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{-- {{ $rental->end_time}} --}}
                                {{ $end_time }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Period
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $plan->name }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Price
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $plan->price }} &#8364;
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:px-6 text-center mt-4 items-center">
                            <div id="paypal-button-container"></div>
                            <div>

                                <a href="{{ route('home') }}" class=" bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
                            </div>
                        </div>
                        
                    </dl>
                </div>
        
        </div>
    </div>
   
</x-app-layout>
 <!-- Replace "test" with your own sandbox Business account app client ID -->
 <script src="https://www.paypal.com/sdk/js?client-id=AVkELTVSTm95KMgxyRhuxuWInYolxp9SBPaGYkEYJYF_A2F6PBzwdXsPNeEvQolhV1eMhYb8smdNX3ct&currency=EUR"></script>
 <!-- Set up a container element for the button -->

 <script>
    paypal.Buttons({
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
          return fetch('/api/paypal/create-payment', {
              method: 'POST',
              body:JSON.stringify({
                  'userId' : "{{auth()->user()->id}}",
                  'rental_period': "{{ $plan->id }}"
              }), headers: {
                    'Content-Type': 'application/json',
                }
          }).then(function(res) {
              return res.json();
          }).then(function(orderData) {
              return orderData.id;
          });
      },
      // Finalize the transaction after payer approval
      onApprove: (data, actions) => {
          return fetch('/api/paypal/execute-payment' , {
              method: 'POST',
              body :JSON.stringify({
                  orderId : data.orderID,
                  userId: "{{ auth()->user()->id }}",
                  rental_period: "{{ $plan->id }}",
                    locker_id: "{{ $locker->id }}",
                    door_id: "{{ $door->id }}",
              }), headers: {
                    'Content-Type': 'application/json',
                }
          }).then(function(res) {
              return res.json();
          }).then(function(orderData) {
            window.location.href = '/dashboard';
              $('#success').slideDown(400);
              $('.card-body').slideUp(0);
          });
      }
    }).render('#paypal-button-container');

    if (window.location.href.includes('/dashboard')) {
    $('#success').slideDown(400);
  }
  </script>