<?php

namespace App\Enum;

enum StatusEnum: string
{
    case ATIVO = 'ativo';
    case pendente = 'pendente';
    case cancelado = 'cancelado';
    case finalizado = 'finalizado';
}
