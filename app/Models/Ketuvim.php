<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketuvim extends Model
{
    use HasFactory;

    protected $table = 'ketuvim';
    protected $fillable = ['name_pt', 'name_he'];
}
