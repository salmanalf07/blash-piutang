<?php

namespace App\Jobs;

use App\Models\reaktif;
use App\Models\Template;
use App\Models\w2bcModel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailW2bc implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$tempalte = Template::find($this->data->template_id);

        $path = base_path('surat-piutang-B23.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

        //menentukan semester
        // $bil = (int)substr($this->data->semester, 8);
        // if ($bil % 2 == 0) { //Kondisi
        //     $semester = "Genap";
        // } else {
        //     $semester = "Ganjil";
        // }
        //end


        $dada['subject'] = "Undangan Welcome Back to Campus BINUS @Bekasi B24 & B25 DAY 2";
        $dada['nim'] = $this->data->nim;
        $dada['name'] = $this->data->name;
        $dada['no_kelompok'] = $this->data->no_kelompok;
        $dada['nama_kelompok'] = $this->data->nama_kelompok;
        $dada['email'] = $this->data->email;
        $dada['link_wa'] = $this->data->link_wa;
        $dada['list_kelompok'] = $this->data->list_kelompok;
        $dada['daebak_tgl'] = $this->data->daebak_tgl;
        $dada['daebak_jam'] = $this->data->daebak_jam;
        $dada['gee_tgl'] = $this->data->gee_tgl;
        $dada['gee_jam'] = $this->data->gee_jam;
        $dada['wardah_tgl'] = $this->data->wardah_tgl;
        $dada['wardah_jam'] = $this->data->wardah_jam;

        Mail::send('emails.blashMail2', $dada, function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject']);
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = w2bcModel::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
