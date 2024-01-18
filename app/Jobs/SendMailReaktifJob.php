<?php

namespace App\Jobs;

use App\Models\reaktif;
use App\Models\Template;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailReaktifJob implements ShouldQueue
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
        $bil = (int)substr($this->data->semester, 8);
        if ($bil % 2 == 0) { //Kondisi
            $semester = "Genap";
        } else {
            $semester = "Ganjil";
        }
        //end

        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadView('reaktif/reaktif', compact('pic'), ['data' => $this->data, 'semester' => $semester]);

        $dada['email'] = $this->data->email;
        $dada['subject'] = "Reaktif Email";
        $dada['nim'] = $this->data->nim;
        $dada["body"] = "Ini Email testing Reaktif pake Queue";
        $dada["semester"] = $semester;
        $dada["tgl_semester"] = $this->data->semester;

        Mail::mailer('ss_mailer')->send('emails.myTestMail', $dada, function ($message) use ($dada, $pdf) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attachData($pdf->output(), $dada['nim'] . ".pdf")
                ->attach(public_path('/assets/file/Form-Reaktif-FM-BINUS-AA-FPU-117.pdf'));
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = reaktif::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
