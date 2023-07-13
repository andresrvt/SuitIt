<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index(Request $request) {
        return view('account', ['view' => 'index', 'user' => $request->user()]);
    }
    
    public function profile(Request $request)
    {
        if($request->input())
        {
            $this->userUpdate($request, $request->user()); 
            return back()->with('success', __('Settings saved.'));
        }

        return view('profile', [ 'user' => $request->user()]);
    }
}