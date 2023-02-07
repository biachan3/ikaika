<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'event_id', 'bank_id', 'users_id', 'date', 'amount', 'qr','status','proof'
    ];
    public function attendee(){
        return $this->hasMany('App\Attendee');
    }
}
