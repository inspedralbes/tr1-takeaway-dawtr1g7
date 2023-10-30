<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Mail;
use stdClass;

class SendMailPDFController extends Controller
{
    public function sendMailWithPDF($contingut_mail)
    {
        $llibres = [];
        foreach ($contingut_mail as $llibre) {
            $obj = new stdClass();
            $obj->titol = $llibre->titol;
            $obj->preu = $llibre->preu;
            $obj->quantitat = $llibre->quantitat;
            $llibres[] = $obj; 
        }

        $data = [
            'id' => $contingut_mail[0]->id,
            'name' => $contingut_mail[0]->name,
            'estat' => $contingut_mail[0]->estat,
            'email' => $contingut_mail[0]->email,
            'title' => "L'ESTAT DE LA TEVA COMANDA HA CANVIAT",
            'llibres' => $llibres
        ];

        $pdf = PDF::loadView('mail.canvi-estat', $data);

        Mail::send('mail.canvi-estat', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "canvi_estat.pdf");
        });

    }
}