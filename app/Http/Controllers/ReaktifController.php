<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailReaktifJob;
use App\Models\reaktif;
use App\Models\Template;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ReaktifController extends Controller
{
    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = reaktif::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/reaktif');
    }

    public function send_mail(Request $request)
    {

        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            $base = reaktif::where(['id' => $request->mahasiswa[$count]]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailReaktifJob::dispatch($data);
        }

        return redirect('/reaktif');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }

    // public function send_mail(Request $request)
    // {

    //     for ($count = 0; $count < count($request->mahasiswa); $count++) {

    //         $base = reaktif::where(['id' => $request->mahasiswa[$count]]);
    //         // $base->update([
    //         //     'template_id' => $request->template_id,
    //         // ]);

    //         $data = $base->first();

    //         //$tempalte = Template::find($data->template_id);

    //         $path = base_path('surat-piutang-B23.png');
    //         $type = pathinfo($path, PATHINFO_EXTENSION);
    //         $img = file_get_contents($path);
    //         $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

    //         //menentukan semester
    //         $bil = (int)substr($data->semester, 8);
    //         if ($bil % 2 == 0) { //Kondisi
    //             $semester = "Genap";
    //         } else {
    //             $semester = "Ganjil";
    //         }
    //         //end

    //         $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView('reaktif/reaktif', compact('pic'), ['data' => $data, 'semester' => $semester]);

    //         $dada['email'] = $data->email;
    //         $dada['subject'] = "Reaktif Email";
    //         $dada['nim'] = $data->nim;
    //         $dada["body"] = "Ini Email testing Reaktif pake Queue";

    //         Mail::send('emails.myTestMail', $dada, function ($message) use ($dada, $pdf) {
    //             //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
    //             $message->to($dada['email'])
    //                 ->subject($dada['subject'])
    //                 ->attachData($pdf->output(), $dada['nim'] . ".pdf")
    //                 ->attach(public_path('/assets/file/Form-Reaktif-FM-BINUS-AA-FPU-117.pdf'));
    //         });

    //         // check for failures
    //         if (!Mail::failures()) {
    //             $postt = reaktif::find($data->id);
    //             $postt->status = "SUCCESS";
    //             $postt->save();
    //             //delete
    //             $postt->delete();
    //         }
    //     }

    //     return redirect('/reaktif');
    //     //return $pdf->stream();
    //     //dd('Mail sent successfully');
    //     //return $pdf->download($data->nim . '-pdf');

    //     //return back();
    // }
    public function cetak_pdf()
    {
        $pegawai = reaktif::find(8);

        $path = base_path('surat-piutang-B23.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

        //menentukan semester
        $bil = (int)substr($pegawai->semester, 8);
        if ($bil % 2 == 0) { //Kondisi
            $semester = "Genap";
        } else {
            $semester = "Ganjil";
        }
        //end

        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView('reaktif/reaktif', compact('pic'), ['data' => $pegawai, 'semester' => $semester]);
        return $pdf->download('Form-Reaktif-pdf');
    }
}
