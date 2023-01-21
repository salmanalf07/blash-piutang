<?php

namespace App\Jobs;

use App\Models\autodebet;
use App\Models\enrichment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailInfoAutodebet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $dada['email'] = $this->data->email;
        $dada['subject'] = "INFORMASI NEXT AUTO DEBET: " . $this->subject;
        $dada['semester'] = $this->data->semester;
        $dada['tgl_batas'] = $this->data->tgl_batas;
        $dada['biaya'] = $this->data->biaya;

        Mail::send('emails.MailNextAutoDebet', $dada, function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attach(public_path('/assets/file/PENGUMUMAN AD BP3 SKS-1 DAN LAB 2220 (7 FEB 2023) Paket.pdf'));
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = autodebet::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
