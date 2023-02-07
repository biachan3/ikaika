<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'startevent', 'endevent', 'price', 'category_id'
    ];

}