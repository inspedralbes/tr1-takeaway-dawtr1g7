<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Mail;
use stdClass;

class SendMailPDFController extends Controller
{
    public function sendMailWithPDF($contingut_mail, $action_code)
    {
        $llibres = [];
        foreach ($contingut_mail as $llibre) {
            $obj = new stdClass();
            $obj->titol = $llibre->titol;
            $obj->preu = $llibre->preu;
            $obj->quantitat = $llibre->quantitat;
            $llibres[] = $obj; 
        }

        if ($action_code == 0) {
            $title = "HEM REBUT LA TEVA COMANDA";
            $mail = 'mail.comanda-rebuda';
            $attach_file_name = "comanda_rebuda.pdf";
            $pdf = 'mail.comanda-rebuda';
        } elseif ($action_code == 1) {
            $title = "L'ESTAT DE LA TEVA COMANDA HA CANVIAT";
            $mail = 'mail.canvi-estat';
            $attach_file_name = "canvi_estat.pdf";
            $pdf = 'mail.canvi-estat';
        }

        $data = [
            'id' => $contingut_mail[0]->id,
            'name' => $contingut_mail[0]->name,
            'estat' => $contingut_mail[0]->estat,
            'email' => $contingut_mail[0]->email,
            'title' => $title,
            'llibres' => $llibres
        ];

        $pdf = PDF::loadView($pdf, $data);

        Mail::send($mail, $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "canvi_estat.pdf");
        });

    }
}