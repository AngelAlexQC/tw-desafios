<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    /**
     * Get the comments for the publication.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
