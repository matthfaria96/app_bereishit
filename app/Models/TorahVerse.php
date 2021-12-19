<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorahVerse extends Model
{
    use HasFactory;

    protected $fillable = ['number_pt', 'number_he', 'verse_pt', 'comments', 'verse_he', 'chapter_id'];


    /**
     * Get the chapter that owns the verse.
     */
    public function chapter()
    {
        return $this->belongsTo(TorahChapter::class);
    }
}
