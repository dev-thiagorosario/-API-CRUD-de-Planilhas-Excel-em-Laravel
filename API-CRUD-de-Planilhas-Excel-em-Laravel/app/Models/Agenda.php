<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\PriorityEnum;
use App\Enum\StatusEnum;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = [
        'user_id',
        'data',
        'dia_da_semana',
        'hora_incio',
        'hora_fim',
        'titulo',
        'descricao',
        'local',
        'categoria',
        'prioridade',
        'status',
        'observacoes',
    ];

    protected $casts = [
        'data' => 'date',
        'hora_incio' => 'datetime:H:i',
        'hora_fim' => 'datetime:H:i',
        'prioridade' => PriorityEnum::class,
        'status' => StatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
