<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index($contingut_mail)
    {
      return view("qrcode");
    }
}