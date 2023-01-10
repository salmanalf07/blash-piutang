<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailMarketing50;
use App\Models\marketing50;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BlashMarketing50 extends Controller
{
    public function send_mail(Request $request)
    {

        for ($count = 204; $count <= 1807; $count++) {

            $base = marketing50::where(['id' => $count]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailMarketing50::dispatch($data);
        }

        return redirect('/dashboard');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }

    public function cetak_pdf()
    {
        $pegawai = marketing50::find(203);

        $path = base_path('ECertificate-Marketing50-Binus.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);


        $pdf = PDF::setOptions(['defaultFont' => 'Gotham Book'])->loadView('pdf/marketing50', compact('pic'), ['data' => $pegawai])->setPaper('a4', 'landscape');
        return $pdf->download('Form-Reaktif-pdf');
    }
}
