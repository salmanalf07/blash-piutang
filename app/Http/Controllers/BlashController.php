<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\BlashPiutang;
use App\Models\Mahasiswa;
use App\Models\Surat;
use App\Models\Template;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BlashController extends Controller
{
    public function index()
    {
        $pegawai = Mahasiswa::all();
        return view('pegawai', ['pegawai' => $pegawai]);
    }

    public function cetak_pdf()
    {
        $pegawai = Mahasiswa::all();

        $pdf = PDF::loadview('pegawai_pdf', ['pegawai' => $pegawai]);
        return $pdf->download('laporan-pegawai-pdf');
    }

    public function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }

    public function send_mail(Request $request)
    {

        $post = new Surat();
        $post->date_send = date("Y-m-d");
        $post->hal = $request->hal;
        $post->date_bayar = date("Y-m-d", strtotime(str_replace('/', '-', $request->date_bayar)));
        $post->norek_id = $request->norek_id;
        $post->semester = $request->semester;
        $post->kemahasiswaan_id = $request->kemahasiswaan_id;
        $post->save();

        $record = Mahasiswa::latest()->first();
        $no_surat = $record->no_surat;

        for ($count = 0; $count < count($request->mahasiswa); $count++) {

            Mahasiswa::where(['id' => $request->mahasiswa[$count]])
                ->update([
                    'surat_id' => $post->id,
                    'no_surat' => ++$no_surat,
                    'template_id' => $request->template_id,
                ]);

            $data = Mahasiswa::with('surat.kemahasiswaan', 'surat.norek')
                ->find($request->mahasiswa[$count]);

            $bulan = date('n');
            $romawi = $this->getRomawi($bulan);

            SendMailJob::dispatch($data, $romawi, $request);

            // $postt = Mahasiswa::find($request->mahasiswa[$count]);
            // $postt->delete();
        }

        return redirect('/dashboard');
        //return $pdf->stream();
        //dd('Mail sent successfully');
        //return $pdf->download($data->nim . '-pdf');

        //return back();
    }

    public function clear(Request $request)
    {
        for ($count = 0; $count < count($request->mahasiswa); $count++) {
            $post = Mahasiswa::find($request->mahasiswa[$count]);
            $post->forceDelete();
        }
        return redirect('/dashboard');
    }
}
