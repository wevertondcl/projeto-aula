<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaDiaHorario extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaDiaHorarioFactory> */
    use HasFactory;

    protected $fillable = [
        'agenda_dia_id',
        'horario',
        'disponibilidade',
    ];

    public function agendaDia(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AgendaDia::class);
    }

    public function agendaDiaHorarioAgendado(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AgendaDiaHorarioAgendado::class);
    }
}
