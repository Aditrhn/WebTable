<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user = User::select('name', 'email')->get();
        return view('users.index', \compact('user'));
    }
    public function create()
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        return \view('users.create', \compact('password'));
    }
    public function store(Request $request)
    {
        // \request()->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        // ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return \redirect('user')->with(['success' => 'Create user success']);
    }
}
