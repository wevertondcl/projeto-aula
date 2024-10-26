<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaDiaHorarioAgendado extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaDiaHorarioAgendadoFactory> */
    use HasFactory;

    protected $fillable = [
        'agenda_dia_horario_id',
        'nome',
        'email',
        'corte',
        'barba',
        'sobrancelha',
        'confirmado',
    ];

    public function agendaDiaHorario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AgendaDiaHorario::class);
    }

}
