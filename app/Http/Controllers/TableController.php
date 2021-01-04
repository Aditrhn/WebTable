<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableName;
use App\Models\Row;
use App\Models\Column;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

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
        TableName::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ]);

        for ($i=1; $i < $request->jmlrow ; $i++) { 
            $nomor = "baris" . $i;
            Row::create([
                'row_name' => $request->$nomor,
                'user_id' => auth()->user()->id,
            ]);
        }
        for ($i=1; $i < $request->jmlcol ; $i++) { 
            $nomor = "kolom" . $i;
            Column::create([
                'column_name' => $request->$nomor,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect('home');
    }
    public function detail($id)
    {
        $title = DB::table('table_names')
            ->join('tables', 'tables.table_name_id', '=', 'table_names.id')
            ->select('table_names.name')
            ->where('table_names.id', '=', $id)
            ->first()
            ->name;
        $col = DB::table('columns')
            ->join('tables', 'tables.column_id', '=', 'columns.id')
            ->select('columns.column_name')
            ->where('tables.table_name_id', '=', $id)
            ->distinct()
            ->get();
        $row = DB::table('rows')
            ->join('tables', 'tables.row_id', '=', 'rows.id')
            ->select('rows.row_name')
            ->where('tables.table_name_id', '=', $id)
            ->distinct()
            ->get();
        return view('table.detail', \compact('title', 'col', 'row'));
    }
    public function add()
    {
        return view('table.add');
    }
    public function select(Request $request)
    {
        $tableName = TableName::select('id', 'name')->where('user_id', '=',  auth()->user()->id)->get();
        $jmlcol = $request->jmlcol;
        $col = Column::select('id', 'column_name')->where('user_id', '=', auth()->user()->id)->get();
        $jmlrow = $request->jmlrow;
        $row = Row::select('id', 'row_name')->where('user_id', '=', auth()->user()->id)->get();
        return view('table.select', \compact('jmlcol', 'jmlrow', 'col', 'row', 'tableName'));
    }
    public function store(Request $request)
    {
        if ($request->jmlcol > $request->jmlrow) {
            $a = $request->jmlcol;
            $b = $request->jmlrow;
        } else {
            $a = $request->jmlrow;
            $b = $request->jmlcol;
        }
        for ($i=1; $i < $a; $i++) { 
            if ($a == $request->jmlcol) {
                $val_a = "kolom" . $i;
            } else {
                $val_a = "baris" . $i;
            }
            for ($j=1; $j < $b; $j++) { 
                if ($b == $request->jmlrow) {
                    $val_b = "baris" . $j;
                } else {
                    $val_b = "kolom" . $j;
                }
                Table::create([
                    'user_id' => auth()->user()->id,
                    'table_name_id' => $request->judul,
                    'row_id' => $request->$val_b,
                    'column_id' => $request->$val_a,
                ]);
            }
        }
        return redirect('home');
    }
}
