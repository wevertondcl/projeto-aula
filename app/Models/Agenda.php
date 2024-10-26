<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /** @use HasFactory<\Database\Factories\AgendaFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'mes', 'ano', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agendaDia(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AgendaDia::class);
    }
}
