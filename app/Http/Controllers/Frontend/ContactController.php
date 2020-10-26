<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\Contact\PostSendContactRequest;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller {

    public function getContact() {
        return view('frontend.contact');
    }

    public function postContact(PostSendContactRequest $request) {
        /*Mail::send('vendor.notifications.contact', ['info' => $request->all()], function ($message) {
            $message->to('admin@admin')->subject('');
        });*/

        return response()->json(trans('alerts.frontend.contact.sent'));
    }
}
