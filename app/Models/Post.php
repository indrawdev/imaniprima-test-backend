<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function todo()
    {
        return $this->belongsTo('App\Models\Todo', 'todo_id');
    }
}
