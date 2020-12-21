<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableName;
use App\Models\User;

class TableController extends Controller
{
    public function create()
    {
        return view('table.create');
    }
    public function store(Request $request)
    {
        // DB::insert('insert into table_names (name) values (?)', [$request->judul]);
        TableName::create([
            'name' => $request->judul
        ]);
        // return redirect('home');
    }
}
