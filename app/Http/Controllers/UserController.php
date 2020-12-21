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
        $user = User::select('id', 'name', 'email')->get();
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
    public function edit($id)
    {
        $data = User::select('*')->where('id', '=', $id)->first();
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        return view('users.edit', \compact('data', 'password'));
    }
    public function update(Request $request, $id)
    {
        if (auth()->user()->id == 1) {
            $data = User::select('*')->where('id', '=', $id)->first();
            if ($request->passowrd != null) {
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            } else {
                $data->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }
            return redirect('user');
        }
    }
}
