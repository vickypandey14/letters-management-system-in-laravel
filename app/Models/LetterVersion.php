<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_id', 'editor_id', 'edited_date', 'version_number', 'content',
    ];
    
    public function letter()
    {
        return $this->belongsTo(Letter::class);
    }
    
    public function editor()
    {
        return $this->belongsTo(User::class);
    }
    
}
