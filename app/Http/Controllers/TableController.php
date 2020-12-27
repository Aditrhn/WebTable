<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableName;
use App\Models\Row;
use App\Models\Column;

class TableController extends Controller
{
    public function create()
    {
        return view('table.create');
    }
    public function rowcol(Request $request)
    {
        $tableName = $request->judul;
        $jmlcol = $request->jmlcol;
        $jmlrow = $request->jmlrow;
        $row = Row::select('id', 'row_name')->where('user_id', '=', auth()->user()->id);
        $col = Column::select('id', 'column_name')->where('user_id', '=', auth()->user()->id);
        return view('table.createrowcol', \compact('tableName', 'jmlcol', 'jmlrow', 'row', 'col'));
    }
    public function success(Request $request)
    {
        $tableName = new TableName;
        $row = new Row;
        $col = new Column;
        $tableName->name = $request->name;
        $tableName->user_id = auth()->user()->id;
        $tableName->save();

        for ($i=1; $i < $request->jmlrow ; $i++) { 
            $nomor = "baris" . $i;
            $row->row_name = $request->$nomor;
            $row->user_id = auth()->user()->id;
            $row->save();
        }
        for ($i=1; $i < $request->jmlcol ; $i++) { 
            $nomor = "kolom" . $i;
            $col->column_name = $request->$nomor;
            $col->user_id = auth()->user()->id;
            $col->save();
        }
        return redirect('home');
    }
    public function detail()
    {
        return view('table.detail');
    }
}
