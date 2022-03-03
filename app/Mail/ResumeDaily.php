<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResumeDaily extends Mailable
{
    use Queueable, SerializesModels;

    public $cars;
    public $users;
    public $proposalsOpen;
    public $proposalsClose;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($car, $user, $proposalOpen, $proposalClose)
    {
        $this->cars = $car;
        $this->users = $user;
        $this->proposalsOpen = $proposalOpen;
        $this->proposalsClose = $proposalClose;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@remotepartner.co', 'Finiclasse')
            ->to('orlando.carvalho31@gmail.com')
            ->subject('Resumo Finiclasse')
            ->markdown('mail.resumeDaily');
    }
}
