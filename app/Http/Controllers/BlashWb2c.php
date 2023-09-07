<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailW2bc;
use App\Models\reaktif;
use App\Models\w2bcModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BlashWb2c extends Controller
{
    public function send_mail(Request $request)
    {

        for ($count = 1806; $count <= 1806; $count++) {

            $base = w2bcModel::where(['id' => $count]);
            // $base->update([
            //     'template_id' => $request->template_id,
            // ]);

            $data = $base->first();

            SendMailW2bc::dispatch($data);
        }

        return redirect('/reaktif');

        // return view('emails.MailW2bc');

        //return back();
    }
}
