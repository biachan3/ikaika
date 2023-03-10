@component('mail::message')
# New Ticket Created

A new ticket has been created with the following details:

**Subject:** {{ $ticket->subject }}

**Description:**
{{ $ticket->description }}

**Category:** {{ $ticket->category }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
