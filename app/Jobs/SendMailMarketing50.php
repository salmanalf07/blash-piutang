<?php

namespace App\Jobs;

use App\Models\marketing50;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailMarketing50 implements ShouldQueue
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

        $path = base_path('ECertificate-Marketing50-Binus.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

        $pdf = PDF::setOptions(['defaultFont' => 'Gotham Book'])->loadView('pdf/marketing50', compact('pic'), ['data' => $this->data])->setPaper('a4', 'landscape');


        $dada['subject'] = "E-Certificate Marketing 5.0 : Technology for Humanity";
        $dada['name'] = $this->data->name;
        $dada['email'] = $this->data->email;

        Mail::send('emails.MailMarketing50', $dada, function ($message) use ($dada, $pdf) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attachData($pdf->output(), "E-Certificate Marketing 5.0.pdf");
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = marketing50::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
