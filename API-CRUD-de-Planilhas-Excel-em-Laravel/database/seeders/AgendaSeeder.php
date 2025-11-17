<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agenda = [
            [
                'data'        => '2025-11-17',
                'dia_semana'  => 'segunda',
                'hora_inicio' => '08:00',
                'hora_fim'    => '08:30',
                'titulo'      => 'Planejar dia',
                'descricao'   => 'Organizar prioridades da semana',
                'local'       => 'Casa',
                'categoria'   => 'pessoal',
                'prioridade'  => 'alta',
                'status'      => 'pendente',
                'observacoes' => null,
            ],
            [
                'data'        => '2025-11-17',
                'dia_semana'  => 'segunda',
                'hora_inicio' => '09:00',
                'hora_fim'    => '12:00',
                'titulo'      => 'Desenvolvimento API',
                'descricao'   => 'Implementar importação de planilhas Excel',
                'local'       => 'Trabalho',
                'categoria'   => 'trabalho',
                'prioridade'  => 'alta',
                'status'      => 'pendente',
                'observacoes' => 'Focar no módulo de Excel',
            ],
            [
                'data'        => '2025-11-17',
                'dia_semana'  => 'segunda',
                'hora_inicio' => '19:00',
                'hora_fim'    => '20:30',
                'titulo'      => 'Estudo Laravel',
                'descricao'   => 'Estudar CRUD de planilhas com Excel',
                'local'       => 'Casa',
                'categoria'   => 'estudo',
                'prioridade'  => 'media',
                'status'      => 'pendente',
                'observacoes' => null,
            ],
            [
                'data'        => '2025-11-18',
                'dia_semana'  => 'terca',
                'hora_inicio' => '19:30',
                'hora_fim'    => '21:00',
                'titulo'      => 'Treino futsal',
                'descricao'   => 'Treino físico e técnico',
                'local'       => 'Quadra',
                'categoria'   => 'treino',
                'prioridade'  => 'media',
                'status'      => 'pendente',
                'observacoes' => 'Levar chuteira',
            ],
            [
                'data'        => '2025-11-19',
                'dia_semana'  => 'quarta',
                'hora_inicio' => '09:00',
                'hora_fim'    => '10:00',
                'titulo'      => 'Reunião com coordenação',
                'descricao'   => 'Alinhar demandas do sistema',
                'local'       => 'SSP',
                'categoria'   => 'trabalho',
                'prioridade'  => 'alta',
                'status'      => 'pendente',
                'observacoes' => null,
            ],
        ];

        foreach ($agenda as $item) {
            Agenda::create($item);
        }
    }
}
