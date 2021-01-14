<?php

namespace App\Http\Controllers;

use App\Models\TableName;
use Illuminate\Support\Facades\DB;

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
        $tableName = DB::table('table_names')
            ->join('tables', 'tables.table_name_id', '=', 'table_names.id')
            ->select('table_names.name as table_name', 'table_names.id as id')
            ->distinct()
            ->get();
        return view('dashboard', \compact('tableName'));
    }
}
