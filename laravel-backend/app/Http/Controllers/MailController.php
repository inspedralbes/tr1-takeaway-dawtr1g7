<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CanviEstat;

class MailController extends Controller
{
    public function sendMail($contingut_mail) {
        Mail::to($contingut_mail[0]->email)->send(new CanviEstat($contingut_mail));
    }
}
