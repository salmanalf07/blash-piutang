<?php

namespace App\Jobs;

use App\Models\detReminPemb1;
use App\Models\detReminPemb2;
use App\Models\reminderPembayaran;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailReminderPembayaran implements ShouldQueue
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
        $dada['subject'] = "[REVISI REMINDER] Peringatan Pembayaran";


        $dad = $this->data;

        Mail::send('emails.MailReminderPembayaran', ['data' => $this->data, $dada], function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attach(public_path('/assets/file/Reminder-Pembayaran.jpg'));
        });



        // check for failures
        if (!Mail::failures()) {
            $post = reminderPembayaran::find($this->data->id);
            $post->status = "SUCCESS";
            $post->save();
            //delete
            $post->delete();
            $postt = detReminPemb1::where('reminPembId', $this->data->id);
            $postt->delete();
            $posttt = detReminPemb2::where('reminPembId', $this->data->id);
            $posttt->delete();
        }
    }
}
