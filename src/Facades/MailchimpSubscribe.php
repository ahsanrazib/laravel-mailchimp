<?php

namespace MailchimpSubscribe\Facades;

use Illuminate\Support\Facades\Facade;

class MailchimpSubscribe extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mailchimp-subscribe';
    }
}
