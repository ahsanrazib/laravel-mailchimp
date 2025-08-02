<?php

namespace MailchimpSubscribe;

use Illuminate\Support\ServiceProvider;

class MailchimpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mailchimp.php', 'mailchimp');

        $this->app->singleton('mailchimp-subscribe', function ($app) {
            return new MailchimpManager();
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mailchimp');
        $this->publishes([
            __DIR__.'/../config/mailchimp.php' => config_path('mailchimp.php'),
        ]);
    }
}
