<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Proposal;

class ProposalApproval extends Mailable
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

        return $this->from('info@remotepartner.co', 'Finiclasse')
            ->to($this->proposal->initialBusinessStudy->businessStudyAuthorization->responsible)
            ->subject('Pedido de aprovação de proposta comercial Finiclasse')
            ->markdown('mail.proposalApproval');
    }
}
