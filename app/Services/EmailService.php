<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;
use Mail as SimpleMail;


class EmailService
{
    public function send($data)
    {
        SimpleMail::send('mail.base', ['data' => $data['body']], function ($message) use ($data) {
            $message->to($data['email'], env('MAIL_FROM_ADDRESS'))
            ->subject($data['subject']);
            error_log('mensaje enviado');
        });
    }
}
