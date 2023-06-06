<x-app-layout>
    <div class="container my-12 mx-auto md:px-12 p-5">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="px-4 py-5 sm:px-6">
                <h4 class="mt-2 text-lg font-bold">Rental Details</h4>
            </div>
            <div class="border-t border-gray-200">
                <div>
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
                            Locker Address
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
                            {{ $start_time }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            End Date
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
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

                    <div class="bg-white px-4 py-5 sm:px-6 mt-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="text-center">
                                <div id="paypal-button-container" style="max-width: 150px; margin: 0 auto;"></div>
                            </div>
                            <div>
                                <div class="container mx-auto">
                                    <div class="flex justify-center">
                                        <div id="success" style="display: none"
                                            class="col-md-8 text-center h3 p-4 bg-success text-light rounded">The
                                            payment was successful.</div>
                                        <div class="w-8/12">
                                            <div class="bg-white shadow-md rounded-lg">
                                                <div
                                                    class="bg-gray-200 text-center py-4 px-6 rounded-t-lg">Pay with Card
                                                </div>
                                                <div class="p-6">
                                                    <form method="POST"
                                                        action="{{ route('rentals.purchase',$plan) }}"
                                                        class="card-form mt-3 mb-3">
                                                        @csrf
                                                        <input type="hidden" name="payment_method"
                                                            class="payment-method">
                                                        <input type="hidden" name="locker_id"
                                                            value="{{ $locker->id }}">
                                                        <input type="hidden" name="door_id"
                                                            value="{{ $door->id }}">
                                                        <div class="mb-4">
                                                            <input
                                                                class="StripeElement form-input px-4 py-3 rounded-lg w-full"
                                                                name="card_holder_name"
                                                                placeholder="Cardholder Name">
                                                        </div>
                                                        <div>
                                                            <div id="card-element"></div>
                                                        </div>
                                                        <div id="card-errors" role="alert"></div>
                                                        <div class="mt-3 text-center">
                                                            <button type="submit"
                                                                class="bg-red-800 text-white font-bold py-2 px-4 rounded">
                                                                Pay {{$plan->price}} $ <span class="icon"
                                                                    hidden><i
                                                                        class="fas fa-sync fa-spin"></i></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('home') }}"
                                class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
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
            window.location.href = '/invoices';
              $('#success').slideDown(400);
              $('.card-body').slideUp(0);
          });
      }
    }).render('#paypal-button-container');

    if (window.location.href.includes('/dashboard')) {
    $('#success').slideDown(400);
  }
  </script>



<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style})
    card.mount('#card-element')
    let paymentMethod = null
    $('.card-form').on('submit', function (e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()}
                }
            }
        ).then(function (result) {
            if (result.error) {
                toastr.error('المعطيات التي قمت بإدخالها تحتوي على أخطاء! راجعها وحاول مرة أخرى.')
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
                $('span.icon').removeAttr('hidden');
                $('button.pay').attr('disabled', true)
            }
        })
        return false
    })
</script>