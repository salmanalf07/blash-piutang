<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailInfoAutodebet;
use App\Models\autodebet;
use Illuminate\Http\Request;

class InfoautodebetController extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = autodebet::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/infoautodebet');
    }

    public function send_mail(Request $request)
    {

        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            $base = autodebet::where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();
            $data1 = [
                'subject' => $request->subject,
            ];

            SendMailInfoAutodebet::dispatch($data, $request->subject);
        }

        return redirect('/infoautodebet');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }
}
