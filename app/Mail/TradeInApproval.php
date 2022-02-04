<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Car;

class TradeInApproval extends Mailable
{
    use Queueable, SerializesModels;

    public $proposal;

    /**
     * Create a new message instance..
     *
     * @return void
     */
    public function __construct(Car $car)
    {

        $this->car = $car;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        dd($this->car->proposal);
            //enviar a chefe de vendas e diretor comercial do respetivo stand

            $chefedevendas = User::whereHas(
                'roles', function($q){
                  $q->where('name', 'Chefe de vendas');
                }
              )->get();

            dd ($chefedevendas);
            
            return $this->from('info@remotepartner.co', 'Finiclasse')
            ->to($this->proposal->initialBusinessStudy->businessStudyAuthorization->responsible->email)
            ->subject('Pedido de aprovação de proposta comercial Finiclasse')
            ->markdown('mail.proposalApproval');
    }
}
