<x-app-layout>
    <style>
      .StripeElement {
          box-sizing: border-box;
          height: 40px;
          padding: 10px 12px;
          border: 1px solid transparent;
          border-radius: 4px;
          background-color: white;
          box-shadow: 0 1px 3px 0 #e6ebf1;
          -webkit-transition: box-shadow 150ms ease;
          transition: box-shadow 150ms ease;
      }
      .StripeElement--focus {
          box-shadow: 0 1px 3px 0 #cfd7df;
      }
      .StripeElement--invalid {
          border-color: #fa755a;
      }
      .StripeElement--webkit-autofill {
          background-color: #fefde5 !important;
      }
  </style>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <div id="success" style="display: none" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">The payment was successful.</div>
      <div class="w-8/12">
        <div class="bg-white shadow-md rounded-lg">
          <div class="bg-gray-200 text-center py-4 px-6 rounded-t-lg">Pay with Card</div>
          <div class="p-6">
            <form method="POST" action="{{route('products.purchase')}}" class="card-form  mt-3 mb-3">
              @csrf
              <input type="hidden" name="payment_method" class="payment-method">
              <div class="mb-4">
                <input class="StripeElement form-input px-4 py-3 rounded-lg w-full" name="card_holder_name" placeholder="Cardholder Name">
              </div>
              <div>
                <div id="card-element"></div>
              </div>
              <div id="card-errors" role="alert"></div>
              <div class="mt-3 text-center">
                <button type="submit" class="bg-red-800 text-white font-bold py-2 px-4 rounded">
                  Pay {{$total}} $ <span class="icon" hidden><i class="fas fa-sync fa-spin"></i></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </x-app-layout>
  
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
                  toastr.error('Error processing payment')
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