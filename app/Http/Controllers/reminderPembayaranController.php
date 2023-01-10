<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailReminderPembayaran;
use App\Models\detReminPemb1;
use App\Models\detReminPemb2;
use App\Models\reminderPembayaran;
use Illuminate\Http\Request;

class reminderPembayaranController extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = reminderPembayaran::find($request->mahasiswa[$count]);
            $post->forceDelete();
            $postt = detReminPemb1::where('reminPembId', $request->mahasiswa[$count]);
            $postt->forceDelete();
            $posttt = detReminPemb2::where('reminPembId', $request->mahasiswa[$count]);
            $posttt->forceDelete();
        }
        return redirect('/reminderPembayaran');
    }

    public function send_mail(Request $request)
    {
        // $dada = reminderPembayaran::with('detReminPem1', 'detReminPem2')->find(13);
        // return view('emails/MailReminderPembayaran', $dada);
        // return $dada;
        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            //$base = reminderPembayaran::where(['id' => $request->mahasiswa[$count]]);
            $base = reminderPembayaran::with('detReminPem1', 'detReminPem2')->where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailReminderPembayaran::dispatch($data);
        }

        return redirect('/reminderPembayaran');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
        // <img src="{{$image->embed(public_path('/assets/file/Reminder-Pembayaran.jpg'))}}">
    }
}
