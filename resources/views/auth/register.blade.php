<x-app-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{route('home')}}" title="Home">
                <img class="object-cover h-100 w-96  rounded-xl hidden md:block" src="{{ url('images/login/register.jpg') }}" alt="">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />
       {{-- {{ dd(request()->query())}} --}}
        <form method="POST" action="{{ route('register', request()->query()) }}">
            @csrf
            

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-2">
                <x-label for="email" value="{{ __('login.Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
            <div class="mt-2">
                <x-label for="street" value="{{ __('reg.street') }}" />
                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autocomplete="street" />
            </div>
            <div class="grid grid-cols-2 gap-4">
            <div class="mt-2">
                <x-label for="street_number" value="{{ __('reg.street_number') }}" />
                <x-input id="street_number" class="block mt-1 w-full" type="text" name="street_number" :value="old('street_number')" required autocomplete="street_number" />
            </div>
            <div class="mt-2">
                <x-label for="postcode" value="{{ __('reg.postcode') }}" />
                <x-input id="postcode" class="block mt-1 w-full" type="number" name="postcode" :value="old('postcode')" required autocomplete="postcode" />
            </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
            <div class="mt-2">
                <x-label for="city" value="{{ __('reg.city') }}" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
            </div>
         
            <div class="mt-1">
                <label for="country">{{__('reg.country')}}</label>
              
                    <select class="block mt-1 w-full border border-gray-300  rounded-md" name="country_id" id="country_id" required>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                 
            
            </div>
            </div> 
          
            <div class="mt-2">
                <x-label for="phone_number" value="{{ __('reg.mobile number') }}" />
                <x-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
            </div>
            


            <div class="mt-2">
                <x-label for="password" value="{{ __('reg.Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-2">
                <x-label for="password_confirmation" value="{{ __('reg.Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required  title="Lütfen işaretli yerleri doldurunuz"/>

                            <div class="ml-2">
                      <a class="text-blue-700" target="__blank" href="{{url('terms/AGB_lockport.online.pdf')}}">   {{__('reg.I agree with the')}} {{__('reg.terms and conditions') }} </a>
                            </div>
                        </div>
                    </x-label>
                </div>
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required  />

                            <div class="ml-2">
                 <a class="text-blue-700" target="__blank" href="{{url('privacy/Datenschutzerklärung_lockport.pdf')}}">{{__('reg.Data Protection') }} </a>
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('reg.Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('reg.Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
