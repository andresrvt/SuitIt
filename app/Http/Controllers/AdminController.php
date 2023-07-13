<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Clothes;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\EventsController;


class AdminController extends Controller
{
    public function indexUsers(Request $request)
    {
        $search = $request->input('search');
        $searchBy = in_array($request->input('search_by'), ['name', 'email']) ? $request->input('search_by') : 'name';
        $role = $request->input('role');
        $sortBy = in_array($request->input('sort_by'), ['id', 'name', 'email']) ? $request->input('sort_by') : 'id';
        $sort = in_array($request->input('sort'), ['asc', 'desc']) ? $request->input('sort') : 'desc';
        $perPage = in_array($request->input('per_page'), [10, 25, 50, 100]) ? $request->input('per_page') : config('settings.paginate');

        $users = User::withTrashed()
            ->when($search, function ($query) use ($search, $searchBy) {
                if ($searchBy == 'email') {
                    return $query->searchEmail($search);
                }
                return $query->searchName($search);
            })
            ->when(isset($role) && is_numeric($role), function ($query) use ($role) {
                return $query->ofRole($role);
            })
            ->orderBy($sortBy, $sort)
            ->paginate($perPage)
            ->appends(['search' => $search, 'search_by' => $searchBy, 'role' => $role, 'sort_by' => $sortBy, 'sort' => $sort, 'per_page' => $perPage]);


        return view('admin.container', ['view' => 'admin.users.list', 'users' => $users]);
    }

    public function editUser($id)
    {
        $user = User::withTrashed()
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.container', ['view' => 'account.profile', 'user' => $user]);
    }

    // Delete user completly
    public function destroyUser(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if ($request->user()->id == $user->id && $user->role == "user") {
            return redirect()->route('admin.users.edit', $id)->with('error', __('Operation denied.'));
        }

        $user->forceDelete();

        return redirect()->route('admin.users')->with('success', __(':name has been deleted.', ['name' => $user->name]));
    }

    /**
     * Soft delete the User.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function disableUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->user()->id == $user->id && $user->role == "user") {
            return redirect()->route('admin.users', $id)->with('error', __('Operation denied.'));
        }

        $user->delete();
        return redirect()->route('admin.users', $id)->with('success', __('Settings saved.'));
    }

    /**
     * Restore the soft deleted User.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.users', $id)->with('success', __('Settings saved.'));
    }


    public function indexClothes()
    {

        $clothes = Clothes::all();
        
        return view('admin.table', ['clothes' => $clothes]);
    }

    public function editClothes($id=null)
    {
        $categories = Category::all();
        $events = Event::all();
        if($id){
            $clothes = Clothes::where('id', $id)->firstOrFail();

        return view('admin.clothes', ['view' => 'clothes', 'clothes' => $clothes, 'categories' => $categories, 'events' => $events]);
        }else{

        return view('admin.createClothes', ['view' => 'clothes', 'categories' => $categories, 'events' => $events]);
        }

    }

    public function saveClothes(Request $request, $id = null)
    {

        if ($id)
            $clothes = Clothes::findOrFail($id);
        else
            $request->validate([
                'name' => 'required|unique:clothes,name|string|min:2|max:255',
                'color' => 'required|string|min:2|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'comfort_level' => 'required|integer|min:1|max:10',
                'season' => 'required',
                'category_id' => 'required'
            ]);

            if ($id)
                $clothes = Clothes::findOrFail($id);
            else
                $clothes = new Clothes();


            $errors = $request->has('errors');

            if (!$errors) {
            $clothes->name = $request->input('name');
            $clothes->color = $request->input('color');
            $clothes->brand = $request->input('brand');
            $clothes->season = $request->input('season');
            $clothes->price = $request->input('price');
            $clothes->comfort_level = $request->input('comfort_level');
            $clothes->general = true;
            $clothes->category_id = $request->input('category_id');

            $clothes->save();
            $imageName = "image-" . $clothes->id . '.' . $request->image->extension();
            $request->image->move(public_path('assets\img\gallery'), $imageName);
            $clothes->image = $imageName;
            $clothes->save();

            // UPDATE
            if ($id){
                $clothes->events()->detach();

                if(count($request->event) ==1){
                    EventsController::addArticle($clothes, $request->event);
                }else{
                    foreach ($request->event as $event) {
                        EventsController::addArticle($clothes, $event);
                    }
                }

                return redirect()->route('admin.table', $id)->with('success', __('Settings saved.'));
            }
            // CREATE
            else{

            if(count($request->event) ==1){
                EventsController::addArticle($clothes, $request->event);
            }else{
                foreach ($request->event as $event) {
                    EventsController::addArticle($clothes, $event);
                }
            }

                return redirect()->route('admin.table')->with('success', __(':name has been created.', ['name' => $request->input('name')]));
        }} else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }

    // Delete clothes completly
    public function destroyClothes(Request $request, $id)
    {
        $clothes = Clothes::findOrFail($id);

        $clothes->delete();

        return redirect()->route('admin.table')->with('success', __(':name has been deleted.', ['name' => $clothes->name]));
    }

    /**
     * Soft delete the Clothes.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function disableClothes(Request $request, $id)
    {
        $clothes = Clothes::findOrFail($id);

        $clothes->delete();
        return redirect()->route('admin.clothes')->with('success', __('Settings saved.'));
    }

    // public function indexCategories(Request $request)
    // {
    //     $search = $request->input('search');
    //     $searchBy = in_array($request->input('search_by'), ['name', 'description']) ? $request->input('search_by') : 'name';
    //     $sortBy = in_array($request->input('sort_by'), ['id', 'name', 'description']) ? $request->input('sort_by') : 'id';
    //     $sort = in_array($request->input('sort'), ['asc', 'desc']) ? $request->input('sort') : 'desc';
    //     $perPage = in_array($request->input('per_page'), [10, 25, 50, 100]) ? $request->input('per_page') : config('settings.paginate');

    //     $categories = Category::when($search, function ($query) use ($search, $searchBy) {
    //         if ($searchBy == 'description') {
    //             return $query->searchDescription($search);
    //         }
    //         return $query->searchName($search);
    //     })
    //         ->orderBy($sortBy, $sort)
    //         ->paginate($perPage)
    //         ->appends(['search' => $search, 'search_by' => $searchBy, 'sort_by' => $sortBy, 'sort' => $sort, 'per_page' => $perPage]);

    //     return view('admin.container', ['view' => 'admin.categories.list', 'categories' => $categories]);
    // }

    // public function editCategory($id)
    // {
    //     $category = Category::findOrFail($id);

    //     return view('admin.container', ['view' => 'categories.edit', 'category' => $category]);
    // }

    // Función para guardar o actualizar un registro de Category
//     public function saveCategory(SaveCategoryRequest $request, $id = null)
//     {
//         if ($id)
//             $category = Category::findOrFail($id);
//         else
//             $category = new Category();

//         $category->name = $request->input('name');
//         $category->description = $request->input('description');
//         $category->save();

//         if ($id)
//             return redirect()->route('admin.categories.edit', $id)->with('success', __('Settings saved.'));
//         else
//             return redirect()->route('admin.categories')->with('success', __(':name has been created.', ['name' => $request->input('name')]));
//     }

//     // Delete category completly
//     public function destroyCategory(Request $request, $id)
//     {
//         $category = Category::findOrFail($id);

//         $category->delete();

//         return redirect()->route('admin.categories')->with('success', __(':name has been deleted.', ['name' => $category->name]));
//     }

//     /**
//      * Soft delete the Category.
//      *
//      * @param Request $request
//      * @param $id
//      * @return \Illuminate\Http\RedirectResponse
//      * @throws \Exception
//      */
//     public function disableCategory(Request $request, $id)
//     {
//         $category = Category::findOrFail($id);

//         $category->delete();
//         return redirect()->route('admin.categories')->with('success', __('Settings saved.'));
//     }

//     /**
//      * Restore the soft deleted Category.
//      *
//      * @param $id
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function restoreCategory($id)
//     {
//         $category = Category::withTrashed()->findOrFail($id);
//         $category->restore();

//         return redirect()->route('admin.categories')->with('success', __('Settings saved.'));
//     }
}
