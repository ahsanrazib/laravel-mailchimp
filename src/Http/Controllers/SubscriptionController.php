<?php

namespace MailchimpSubscribe\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpSubscribe\Facades\MailchimpSubscribe;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        MailchimpSubscribe::subscribe($request->email);
        MailchimpSubscribe::addTags($request->email, ['Newsletter']);
        return back()->with('status', 'Subscribed successfully!');
    }
}
