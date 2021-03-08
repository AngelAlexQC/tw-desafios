<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    const STATUS_PENDIENTE = 'Pendiente de Revisión';
    const STATUS_APROBADO = 'Aprobada';
    const STATUS_RECHAZADO = 'Rechazada';
    /**
     * Get the publication that owns the comment.
     */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
