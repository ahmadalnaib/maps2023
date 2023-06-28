@component('mail::message')
{{ __('You have been invited to join the :team team!', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('If you do not have an account, you may create one by clicking the button below. After creating an account, you may click the invitation acceptance button in this email to accept the team invitation:') }}

@component('mail::button', ['url' => route('register', 'token='.\Hash::make($invitation->email))])
{{ __('Create Account') }}
@endcomponent

@endif



{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
