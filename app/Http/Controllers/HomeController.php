<?php

namespace App\Http\Controllers;

use App\Models\TableName;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tableName = TableName::select('*')->get();
        return view('dashboard', \compact('tableName'));
    }
}
