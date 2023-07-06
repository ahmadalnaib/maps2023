<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('pro.Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

        

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0 mb-5">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            @if (Auth::check() && Auth::user()->role === 'basic')

            <div class="mt-10 sm:mt-0 border-t-2 border-gray-100">
               <div class="mt-4">
                @include('profile.data')
               </div>
            </div>
  
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @php
            $expiredRental  = auth()->user()->rentals->where('end_time', '<', now()->subWeek())->first();
        @endphp
    
        @if ($expiredRental || !auth()->user()->rentals->count())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
               
                @endif
            @endif

        @endif
        </div>
    </div>
</x-admin>
