<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Publication extends Model
{
    public $appends = ['comments_by_me'];
    use HasFactory;
    /**
     * Get the comments for the publication.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the user for the publication.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if I commented this publication
     */
    public function getCommentsByMeAttribute()
    {
        return Comment::where('user_id', Auth::user()->id)->where('publication_id', $this->id)->get();
    }
}
