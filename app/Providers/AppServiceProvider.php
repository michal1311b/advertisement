<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Advertisement;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Advertisement::observe(PostObserver::class);

        \Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
            $min_field = $parameters[0];
            $data = $validator->getData();
            $min_value = $data[$min_field];
            return $value > $min_value;
        });   
    
        \Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
            return str_replace(':field', $parameters[0], $message);
        });

        VerifyEmail::toMailUsing(function ($notifiable){
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                ['id' => $notifiable->getKey()]
            );

            return (new MailMessage())
            ->subject('EmployMed - Email verification')
            ->greeting('Witaj,')
            ->line('Aktywuj swoje konto w serwisie EmployMed.eu, klikając w przycisk poniżej.')
            ->action('Kliknij, aby aktywować konto', $verifyUrl)
            ->line('Ten email został wygenerowany automatycznie. Jeśli nie zakładałeś konta w serwisie, prosimy o kontakt na adres')
            ->line('contactemploymed@gmail.com')
            ->line('w celu jego usunięcia z naszej bazy. Dziękujemy.')
            ->salutation('Pozdrawiamy - Zespół EmployMed');
        });
    }
}
