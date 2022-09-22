<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'chapter_id');
    }
}
