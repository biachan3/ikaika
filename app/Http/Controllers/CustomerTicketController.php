<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
    use App\Mail\NewTicket;
use Illuminate\Http\Request;

class CustomerTicketController extends Controller
{
    
    public function createTicket(Request $request)
    {
        // Validation rules
        $rules = [
            'subject' => 'required',
            'description' => 'required',
            'category' => 'required',
        ];
    
        // Validate input
        $this->validate($request, $rules);
    
        // Create new ticket
        $ticket = new Ticket;
        $ticket->subject = $request->input('subject');
        $ticket->description = $request->input('description');
        $ticket->category = $request->input('category');
        $ticket->save();
    
        // Send email notification
        Mail::to('support@yourwebsite.com')->send(new NewTicket($ticket));
    
        // Redirect to ticket page
        return redirect()->route('ticket.show', $ticket->id);
    }
    
    
}
