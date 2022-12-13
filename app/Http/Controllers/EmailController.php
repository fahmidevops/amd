<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        // Mail::to($request->user())->send(new MailableClass);
        $newEmail = [
            'title' => 'Tes Email Laravel',
            'body' => 'Anda mendapatkan undangan kegiatan baru, harap lakukan pengecekan melalui aplikasi siap.bkkbn.go.id'
        ];
        $to = 'fmbo.cool@gmail.com';

        Mail::to($to)->send(new SendEmail($newEmail));
        return 'Berhasil mengirim email';
    }
}
