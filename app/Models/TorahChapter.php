<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorahChapter extends Model
{
    use HasFactory;
    
    protected $fillable = ['number_pt', 'number_he', 'book_id'];
}
