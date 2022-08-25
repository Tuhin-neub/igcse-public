<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    public function chapter()
    {
        return $this->hasOne(Chapter::class, 'id', 'chapter_id');
    }
}
