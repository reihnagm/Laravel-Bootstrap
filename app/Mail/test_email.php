<?php

namespace App\Mail;

use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class test_email extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    public function __construct(User $data_user_dari_controller) {
        $this->user = $data_user_dari_controller;
    }

    public function build() {
        return $this->from('dari@siapa.com')->view('vendor.mail.test');
    }
}
