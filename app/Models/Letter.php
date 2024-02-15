<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', 'content', 'author_id', 'creation_date', 'text_color', 'access_level',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function versions()
    {
        return $this->hasMany(LetterVersion::class);
    }
}
