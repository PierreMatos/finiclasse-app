<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Proposal;
use App\Models\User;

class TradeInApproval extends Mailable
{
  use Queueable, SerializesModels;

  public $proposal;

  /**
   * Create a new message instance..
   *
   * @return void
   */
  public function __construct(Proposal $proposal)
  {
    $this->proposal = $proposal;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    //enviar a chefe de vendas e diretor comercial do respetivo stand
    $chefedevendas = User::whereHas(
      'roles',
      function ($q) {

        $standID = $this->proposal->vendor->stand_id;

        $q->where('name', 'Chefe de vendas')
          ->where('stand_id', $standID);
      }
    )->get('email');

    $chefedevendas->each(function ($item, $key) {
      return $this->from('info@remotepartner.co', 'Finiclasse')
        ->to($item->email)
        ->subject('Pedido de aprovação de proposta comercial Finiclasse')
        ->markdown('mail.tradeinApproval');
    });
  }
}
