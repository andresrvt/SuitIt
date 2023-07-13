<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use Illuminate\Http\Request;
use App\Http\Controllers\WardrobesController;
use App\Http\Controllers\EventsController;

class ClothesController extends Controller
{
    public function showClothes()
    {

        $clothes = Clothes::where('general', true)->get(); // Nos saca todos las prendas generales de la BBDD
        return view('index', @compact('clothes'));

    }

    public function createClothes(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clothes,name|string|min:2|max:255',
            'color' => 'required|string|min:2|max:255',
            'brand' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'comfort_level' => 'required|integer|min:1|max:10',
            'season' => 'required',
            'category' => 'required'
        ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $article = new Clothes;
            $article->name = $request['name'];
            $article->color = $request['color'];
            $article->brand = $request['brand'];
            $article->season = $request['season'];
            $article->price = $request['price'];
            $article->comfort_level = $request['comfort_level'];
            $article->category_id = $request['category'];

            $article->save();
            $imageName = "image-" . $article->id . '.' . $request->image->extension();
            $request->image->move(public_path('assets\img\gallery'), $imageName);
            $article->image = $imageName;

            $article->save();

            EventsController::addArticle($article->id, $request['event']);
            WardrobesController::addArticle($article->id, $request['quantity']);

            return back()->with('message', 'Artículo añadido correctamente');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }


}
 ?>




