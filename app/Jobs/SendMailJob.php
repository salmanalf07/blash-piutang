<?php

namespace App\Jobs;

use App\Models\Mahasiswa;
use App\Models\Template;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data, $romawi;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $romawi, $request)
    {
        $this->data = $data;
        $this->romawi = $romawi;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tempalte = Template::find($this->data->template_id);

        $path = base_path('surat-piutang-B23.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);


        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView($tempalte->template, compact('pic'), ['data' => $this->data, 'romawi' => $this->romawi]);

        $dada['email'] = $this->data->email;
        $dada['subject'] = $this->data->surat['hal'];
        $dada['nim'] = $this->data->nim;
        $dada["body"] = "Ini Email testing pake Queue";

        Mail::send('emails.myTestMail', $dada, function ($message) use ($dada, $pdf) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attachData($pdf->output(), $dada['nim'] . ".pdf");
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = Mahasiswa::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
