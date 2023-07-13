<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Clothes;

class EventsController extends Controller
{
    public static function addArticle($clothes, $id)
    {
        $clothes->events()->attach($id);
    }
}
