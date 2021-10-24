<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorahChapter extends Model
{
    use HasFactory;
    
    protected $fillable = ['number_pt', 'number_he', 'book_id'];

    /**
     * Get the book that owns the chapter.
     */
    public function book()
    {
        return $this->belongsTo(Torah::class);
    }

    public function verses()
    {
        return $this->hasMany(TorahVerse::class);
    }
}
