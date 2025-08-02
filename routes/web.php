<?php

use Illuminate\Support\Facades\Route;
use MailchimpSubscribe\Http\Controllers\SubscriptionController;

Route::view('/subscribe', 'mailchimp::subscribe-form');
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('mailchimp.subscribe');
