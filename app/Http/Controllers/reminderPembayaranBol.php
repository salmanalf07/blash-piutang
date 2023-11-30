<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailReminderPembayaranBol;
use App\Models\reminderPembayaranBol as ModelsReminderPembayaranBol;
use Illuminate\Http\Request;

class reminderPembayaranBol extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = ModelsReminderPembayaranBol::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/reminderPembayaranBol');
    }
    public function send_mail(Request $request)
    {
        // $dada = ModelsReminderPembayaranBol::find(1);
        // return view('emails/MailReminderPembayaranBol', ["data" => $dada]);
        // return $dada;
        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            //$base = reminderPembayaran::where(['id' => $request->mahasiswa[$count]]);
            $base = ModelsReminderPembayaranBol::where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailReminderPembayaranBol::dispatch($data);
        }

        return redirect('/reminderPembayaranBol');
    }
}
