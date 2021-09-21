<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
    public function sendEmailUser()
    {
        $ldate = date('Y-m-d'); //OBTENGO LA FECHA DE HOY
        $productLog = DB::select("SELECT * FROM product_new_logs WHERE created_at between '" . $ldate . "' and '" . $ldate . " 23:59:59'"); //SEEDER: ACTUALIZO LOS DATOS
        if (empty($productLog)) {
            return redirect('/')->with(['errors' => 'No se envio email debido a que no hay nada registrado hoy']);
        } else {
            Mail::send('emails.welcome', compact("productLog"), function ($message) {
                $message->from('youremail', 'Email de Prueba');
                $message->to('youremail')->subject('Reporte del día');
            });
            return redirect('/')->with(['success' => 'Email enviado con exito']); //OK CAMBIO LOS DATOS
        }
    }
}
