<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailEnrichmentJob;
use App\Models\enrichment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EnrichmentController extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = enrichment::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/enrichment');
    }

    public function send_mail(Request $request)
    {

        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            $base = enrichment::where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailEnrichmentJob::dispatch($data);
        }

        return redirect('/enrichment');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }

    public function cetak_pdf()
    {
        $mahasiswa = enrichment::find(10);

        $path = base_path('surat-piutang-B23.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

        //menentukan semester
        $bil = (int)substr($mahasiswa->semester, 8);
        if ($bil % 2 == 0) { //Kondisi
            $semester = "Genap";
        } else {
            $semester = "Ganjil";
        }
        //end

        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView('enrichment/enrichment', compact('pic'), ['data' => $mahasiswa, 'semester' => $semester]);
        return $pdf->download('laporan-pegawai-pdf');
    }
}
