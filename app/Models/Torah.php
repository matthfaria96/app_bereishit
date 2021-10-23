<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torah extends Model
{
    use HasFactory;

    protected $fillable = ['name_pt', 'name_he'];
    protected $table = 'torah';
}
