<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResumeWeekly extends Mailable
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
        $adminsAndDirectorsAndChefe = User::whereHas('roles', function ($query) {
            $query
                ->whereIn('roles.name', ['Administrador', 'Diretor comercial', 'Chefe de vendas']);
        })->get('email');

        $adminsAndDirectorsAndChefe->each(function ($item) {
            return $this->from('info@remotepartner.co', 'Finiclasse')
                ->to($item->email)
                ->subject('Resumo Finiclasse')
                ->markdown('mail.resumeWeekly');
        });
    }
}
