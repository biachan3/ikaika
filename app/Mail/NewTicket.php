<?php

namespace App\Mail;
use App\Models\SupportTicket;
use App\Ticket;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTicket extends Mailable
{
    public $ticket;
    public function __construct(SupportTicket $ticket)
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
