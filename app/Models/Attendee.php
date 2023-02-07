<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'ticket_id', 'name', 'year', 'faculty', 'id'
    ];
    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }
}
