<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Proposal;

class ProposalRequestAccept extends Mailable
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
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Finiclasse')
            ->to($this->proposal->initialBusinessStudy->businessStudyAuthorization->responsible)
            ->bcc('support@aideal.app')
            ->subject('Proposta comercial Finiclasse APROVADA')
            ->markdown('mail.proposalApproval');
    }
}