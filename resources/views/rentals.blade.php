<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mx-auto my-12 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Rental Details -->
            <div class="bg-gray-100 rounded-lg shadow-xl overflow-hidden">
                <div class="px-4 py-5 sm:px-6">
                    <h4 class="mt-2 text-lg font-bold">{{ __('rental.Booking Details') }}</h4>
                </div>
                <!-- Rental details content -->

                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.Box Number') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $box->number }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.System Name') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p> {{ $system->system_name }}</p>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.System Address') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p> {{ $system->place->address }}</p>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.Valid from') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $start_time }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.Booked until') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $end_time }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.Rental period') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $plan->name }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        {{ __('rental.Price') }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $plan->price }} &#8364;
                    </dd>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="bg-slate-500 rounded-lg shadow-xl overflow-hidden">
                <div class="px-4 py-5 sm:px-6">
                    <h4 class="mt-2 text-lg font-bold P-2 text-white">{{ __('rental.CONFIRM ORDER AND PAY') }}</h4>
                </div>
                <!-- Payment section content -->
                <div class="container mx-auto">
                    <div id="success" style="display: none"
                        class="text-center h3 p-4 bg-green-400 text-white rounded mb-2">
                        {{ __('rental.The payment was successful.') }}</div>
                    <div class="flex justify-center">
                        <div class="w-full md:w-8/12">
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <div class="flex flex-col md:flex-row">



                                    @if ($plan->price == '0.00')
                                        <button
                                            class="tab tab-active   text-black text-center border py-4 px-6 rounded-t-lg w-full md:w-1/2 m-1"
                                            data-target="free-tab">kostenlose Zahlungen</button>
                                    @else
                                        <button
                                            class="tab tab-active bg-green-300 border text-center py-4 px-6 rounded-t-lg w-full md:w-1/2 m-1"
                                            data-target="card-tab">{{ __('rental.Pay with Card') }}</button>

                                        <button
                                            class="tab  text-black text-center border py-4 px-6 rounded-t-lg w-full md:w-1/2 m-1"
                                            data-target="paypal-tab">{{ __('rental.Pay with PayPal') }}</button>
                                    @endif

                                </div>
                                <div class="tab-content mt-4 " id="card-tab" style="display:none">
                                    <form method="POST" action="{{ route('rentals.purchase', $plan) }}"
                                        class="card-form mt-3 mb-3">
                                        @csrf
                                       
                                        <input type="hidden" name="system_id" value="{{ encrypt($system->id) }}">
                                        <input type="hidden" name="box_id" value="{{ encrypt($box->id) }}">

                                     
                                        <div id="card-errors" role="alert"></div>
                                        <div class="mt-3 text-center">
                                            <button type="submit"
                                                class="bg-red-500 text-white font-bold py-2 px-4 rounded"
                                                id="pay-btn">{{ __('rental.Pay') }} {{ $total }} &euro; <span
                                                    class="icon" hidden><i
                                                        class="fas fa-sync fa-spin"></i></span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-content mt-4" id="paypal-tab" style="display:none">
                                    <div class="text-center">
                                        <div id="paypal-button-container" style="max-width: 150px; margin: 0 auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content mt-4 tab-active" style="display:none" id="free-tab">
                                    <div class="text-center">
                                        <form action="{{ route('rentals.save', $plan) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="system_id" value="{{ $system->id }}">
                                            <input type="hidden" name="box_id" value="{{ $box->id }}">
                                            <input type="hidden" name="rental_period" value="{{ $plan->id }}">
                                            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded"
                                                type="submit">{{ __('rental.Pay') }} {{ $plan->price }} &#8364</button>
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
                    class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-4 px-6 rounded">{{ __('rental.Cancel') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script
    src="https://www.paypal.com/sdk/js?client-id=ARd_ANnrVEGySRB13S8F44we_CpSae6bqtcnZbDg_Nh4aMVMkCWIXLngwuKbpW0vv1Zsvk8k3hqwQUqu&currency=EUR">
</script>
<!-- Set up a container element for the button -->

<script>
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return fetch('/api/paypal/create-payment', {
                method: 'POST',
                body: JSON.stringify({
                    'userId': "{{ auth()->user()->id }}",
                    'rental_period': "{{ $plan->id }}"
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken 
                }
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return fetch('/api/paypal/execute-payment', {
                method: 'POST',
                body: JSON.stringify({
                    orderId: data.orderID,
                    userId: "{{ auth()->user()->id }}",
                    rental_period: "{{ $plan->id }}",
                    system_id: "{{ $system->id }}",
                    box_id: "{{ $box->id }}",
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken 
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




<script>
<<<<<<< HEAD
  
=======
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
    let card = elements.create('card', {
        style: style
    })
    card.mount('#card-element')
    let paymentMethod = null
    $('.card-form').on('submit', function(e) {
        $('#pay-btn').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}", {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: $('.card_holder_name').val()
                    }
                }
            }
        ).then(function(result) {
            if (result.error) {
                toastr.error(
                    '__("rental.The data you entered contains errors! Review it and try again")')
                $('#pay-btn').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
               
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
                $('span.icon').removeAttr('hidden');
                $('#pay-btn').attr('disabled', true)
            }
        })
        return false
    })
>>>>>>> aec3c068f5188962b08d9b64ea677338f1f291c0

    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        if (tab.classList.contains('tab-active')) {
            let targetId = tab.getAttribute('data-target');
            console.log(targetId);
            tabContents.forEach(content => {
                if (content.id == targetId) {
                    // console.log('in condition');
                    // console.log(content);
                    content.style.display = 'block';
                    tab.classList.add('bg-green-300');
                }
            });

        }

        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');

            tabs.forEach(tab => tab.classList.remove('tab-active'));
            tabContents.forEach(content => content.style.display = 'none');

            tab.classList.add('tab-active');
            document.getElementById(target).style.display = 'block';

            // Add the background color class to the active tab
            tabs.forEach(tab => {
                if (tab.classList.contains('tab-active')) {
                    tab.classList.add('bg-green-300');
                } else {
                    tab.classList.remove('bg-green-300');
                }
            });
        });


    });
</script>
