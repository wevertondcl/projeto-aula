<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaDia extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaDiaFactory> */
    use HasFactory;

    protected $fillable = [
        'agenda_id',
        'dia',
        'disponibilidade',
    ];

    protected $casts = [
        'dia' => 'datetime',
    ];


    public function agenda(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Agenda::class);
    }

    public function agendaDiaHorario(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AgendaDiaHorario::class);

    }

}
