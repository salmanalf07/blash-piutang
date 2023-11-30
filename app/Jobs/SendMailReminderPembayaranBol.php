<?php

namespace App\Jobs;

use App\Models\detReminPemb1;
use App\Models\detReminPemb2;
use App\Models\reminderPembayaran;
use App\Models\reminderPembayaranBol;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailReminderPembayaranBol implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
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
        $dada['cc1'] = $this->data->email_cc1;
        $dada['subject'] = "[REMINDER] TAGIHAN BIAYA KULIAH";


        $dad = $this->data;

        Mail::mailer('bol_mailer')->send('emails.MailReminderPembayaranBol', ['data' => $this->data, $dada], function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject']);
            if ($dada['cc1'] != null) {
                $message->cc([$dada['cc1']]);
            }
        });



        // check for failures
        if (!Mail::failures()) {
            $post = reminderPembayaranBol::find($this->data->id);
            $post->status = "SUCCESS";
            $post->save();
            //delete
            $post->delete();
        }
    }
}
