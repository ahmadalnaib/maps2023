<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        User::class=>UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('E-Mail Adresse überprüfen')
                ->line('Danke für deine Registrierung.Bitte bestätigen deine E-Mail Adresse.')
                ->action('Bestätigen', $url);
        });

        ResetPassword::toMailUsing(function ($notifiable, $url) {
            $resetUrl = URL::signedRoute('password.reset', ['token' => $url]);
        
            return (new MailMessage)
                ->subject('Passwort zurücksetzen angefordert')
                ->line('Sie erhalten diese E-Mail, weil wir eine Anfrage zum Zurücksetzen des Passworts für Ihr Konto erhalten haben.')
                ->action('Passwort zurücksetzen', $resetUrl)
                ->line('Dieser Link zum Zurücksetzen des Passworts wird in 60 Minuten ablaufen.')
                ->line('Wenn Sie keine Rücksetzung des Passworts beantragt haben, sind keine weiteren Schritte erforderlich.');
        });

        //
    }
}
