<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableName extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];
    public $timestamps = true;
}
