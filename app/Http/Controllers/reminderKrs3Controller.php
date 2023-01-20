<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailReminKrs3;
use App\Models\reminderKrs3;
use Illuminate\Http\Request;

class reminderKrs3Controller extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = reminderKrs3::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/reminderKrs3');
    }

    public function send_mail(Request $request)
    {

        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            $base = reminderKrs3::where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailReminKrs3::dispatch($data);
        }

        return redirect('/reminderKrs3');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }
}
