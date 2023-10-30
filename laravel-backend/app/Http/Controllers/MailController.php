<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CanviEstat;

class MailController extends Controller
{
    public function sendMail($direccio_mail) {
        Mail::to($direccio_mail)->send(new CanviEstat());
    }
}
