<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeviimVerse extends Model
{
    use HasFactory;

    protected $fillable = ['number_pt', 'number_he', 'comments', 'verse_pt', 'verse_he', 'chapter_id'];
}
