@component('mail::message')
{{ __('team.You have been invited to join the :team team!', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('team.If you do not have an account, you may create one by clicking the button below. After creating an account, you may click the invitation acceptance button in this email to accept the team invitation:') }}

@component('mail::button', ['url' => route('register', 'token='.\Hash::make($invitation->email))])
{{ __('team.Create Account') }}
@endcomponent

@endif



{{ __('Viele Grüße') }}
@endcomponent
