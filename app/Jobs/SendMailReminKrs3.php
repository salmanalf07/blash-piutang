<?php

namespace App\Jobs;

use App\Models\reminderKrs3;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailReminKrs3 implements ShouldQueue
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
        $dada['subject'] = "REMINDER REGISTRASI KRS TAHAP 3 SEMESTER " . $this->data->semester;
        $dada['semester'] = $this->data->semester;
        $dada['jatem'] = $this->data->jatem;
        $dada['jatem_auto'] = $this->data->jatem;

        Mail::send('emails.MailReminKrs3', ['data' => $this->data, $dada], function ($message) use ($dada) {
            //Mail::send('emails.myTestMail', $dada, function ($message) use ($dada) {
            $message->to($dada['email'])
                ->subject($dada['subject'])
                ->attach(public_path('/assets/file/Materi Registrasi KRSS, KRS, dan Kelompok Skripsi Semester Genap 2022-2023.pdf'));
        });

        // check for failures
        if (!Mail::failures()) {
            $postt = reminderKrs3::find($this->data->id);
            $postt->status = "SUCCESS";
            $postt->save();
            //delete
            $postt->delete();
        }
    }
}
