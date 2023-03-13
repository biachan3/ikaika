<?php

namespace App\Http\Controllers;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewTicket;
use Illuminate\Http\Request;
class CustomerTicketController extends Controller
{
    
    public function index()
    {
        return view('support.index');
    }
    public function createTicket(Request $request)
    {
        // Validation rules
        $rules = [
            'subject' => 'required',
            'description' => 'required',
            'category' => 'required',
            'email'=>'required',
        ];
    
        // Validate input
        $this->validate($request, $rules);
        $email = $request->input('email');
        // Create new ticket
        $ticket = new SupportTicket;
        $ticket->email = $email;
        $ticket->subject = $request->input('subject');
        $ticket->description = $request->input('description');
        $ticket->category = $request->input('category');
        $ticket->save();
      
        // Send email notification
        Mail::to($email)->send(new NewTicket($ticket));
    
        // Redirect to ticket page
        return redirect()->route('ticket.show', $ticket->id);
    }
    
    
}
