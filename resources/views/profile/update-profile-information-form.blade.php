<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('pro.Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('pro.Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>
 

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('login.Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('pro.Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('pro.Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('pro.A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('reg.city') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="postcode" value="{{ __('reg.postcode') }}" />
            <x-input id="postcode" type="text" class="mt-1 block w-full" wire:model.defer="state.postcode" autocomplete="postcode" />
            <x-input-error for="postcode" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="street" value="{{ __('reg.street') }}" />
            <x-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="state.street" autocomplete="street" />
            <x-input-error for="street" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="street_number" value="{{ __('reg.street_number') }}" />
            <x-input id="street_number" type="text" class="mt-1 block w-full" wire:model.defer="state.street_number" autocomplete="street_number" />
            <x-input-error for="street_number" class="mt-2" />
        </div>
      
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone_number" value="{{ __('reg.mobile number') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="state.phone_number" autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('pro.Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('pro.Save') }}
        </x-button>
    </x-slot>
</x-form-section>
