<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function clothes()
    {
        return $this->belongsToMany(Clothes::class, 'clothes_event');
    }
}
