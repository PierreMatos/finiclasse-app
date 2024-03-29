<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class ResumeDaily extends Mailable
{
    use Queueable, SerializesModels;

    public $cars;
    public $users;
    public $proposalsOpen;
    public $proposalsClose;
    public $fromDate;
    public $toDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($car, $user, $proposalOpen, $proposalClose, $toDate, $fromDate)
    {
        $this->cars = $car;
        $this->users = $user;
        $this->proposalsOpen = $proposalOpen;
        $this->proposalsClose = $proposalClose;
        $this->toDate = $toDate;
        $this->fromDate = $fromDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $adminsAndDirectorsAndChefe = User::whereHas('roles', function ($query) {
        //     $query
        //         ->whereIn('roles.name', ['Administrador', 'Diretor comercial', 'Chefe de vendas']);
        // })->get('email');

        //For test 
        $adminsAndDirectorsAndChefe = User::whereIn('id', [16])->get();
        
        $adminsAndDirectorsAndChefe->each(function ($item) {
            return $this->from(env('MAIL_FROM_ADDRESS'), 'Finiclasse')
            ->to($item->email)
            ->bcc('support@aideal.app')
            ->subject('Resumo Finiclasse - '. $this->fromDate )
            ->markdown('mail.resumeDaily');
        });
    }
}