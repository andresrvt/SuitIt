<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Clothes extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function recommendation()
    {
        return $this->belongsToMany(Recommendation::class);
    }

    public function wardrobe()
    {
        return $this->belongsToMany(Wardrobe::class);
    }
}
