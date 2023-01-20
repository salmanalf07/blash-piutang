<?php

namespace App\Jobs;

use App\Models\reminderKrs12;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailReminKrs12 implements ShouldQueue
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

        $dada['email'] = $this->data->email;
        $dada['subject'] = "REMINDER PELUNASAN TAGIHAN " . strtoupper($this->data->tagihan) . " " . $this->data->semester;
        $dada['semester'] = $this->data->semester;
        $dada['jatem'] = $this->data->jatem;
        $dada['jatem_auto'] = $this->data->jatem_auto;

        Mail::send('emails.MailReminKrs12', ['data' => $this->data, $dada], function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attach(public_path('/assets/file/Cara Bayar Manual Semester Regular.pdf'));
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = reminderKrs12::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
