<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'table_name_id', 'row_id', 'column_id'];
    public $timestamps = true;
}
