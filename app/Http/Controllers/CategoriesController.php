<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothes;
use App\Models\Wardrobe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function showCategories()
    {
        $category = Category::all(); // Nos saca todos las categorias de la BBDD
        return view('index', @compact('category'));
    }

    public function filterByCategory($categoryName){
        $category = Category::where('name', $categoryName)->first();

        $wardrobe = Wardrobe::where('user_id', Auth::id())->first();
        $clothes = $wardrobe->clothes()->where('category_id', $category->id)->get();
        $totalPrice = 0;
        foreach ($clothes as $cloth){
            $totalPrice += $cloth->price * $cloth->pivot->quantity;
        }
        $wardrobe->total_price = $totalPrice;
        $wardrobe->update();
        return view('armario', @compact('clothes'));
    }
}
