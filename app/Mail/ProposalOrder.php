<?php

namespace App\Mail;

use App\Models\Proposal;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\FinancingProposal;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $proposal;

    /**
     * Create a new message instance.
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
        //Attach ficheiros dos financiamentos ao email
        $financingProposal = FinancingProposal::where('proposal_id', $this->proposal->id)->get();

        if ($this->proposal->financings->isNotEmpty()) {
            foreach ($financingProposal as $media) {
                $this->attach($media->getFirstMediaUrl('financingproposal'));
            }
        }
        //

        //Attach Pos PDF
        if ($this->proposal->car->getFirstMediaUrl('pos') !== '') {
            $this->attach($this->proposal->car->getFirstMediaUrl('pos')); //Pos PDF
        }
        //

        return $this->from(env('MAIL_FROM_ADDRESS'), 'Finiclasse')
            ->to($this->proposal->client->email)
            // ->bcc('support@aideal.app')
            ->subject('Proposta Comercial Finiclasse')
            ->markdown('mail.proposal');
    }
}
