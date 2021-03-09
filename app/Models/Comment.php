<?php

namespace App\Models;

use App\Mail\NewCommentNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Comment extends Model
{
    use HasFactory;
    const STATUS_PENDIENTE = 'Pendiente de Revisión';
    const STATUS_APROBADO = 'Aprobada';
    const STATUS_RECHAZADO = 'Rechazada';

    protected $fillable = ['user_id', 'publication_id', 'content'];
    /**
     * Get the publication that owns the comment.
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    /**
     * Get the user for the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
    }
}
