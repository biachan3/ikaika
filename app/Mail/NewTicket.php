<?php

namespace App\Mail;
use App\Ticket;

public $ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTicket extends Mailable
{
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
    
    public function build()
    {
        return $this->markdown('emails.new-ticket')
                    ->subject('New Ticket Created')
                    ->with('ticket', $this->ticket);
    }
}
