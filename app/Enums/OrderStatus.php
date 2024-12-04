<?php

namespace App\Enums;

enum OrderStatus:int
{
    case Pendiente = 1;
    case Procesado = 2;
    case Enviado = 3;
    case Completado = 4;
    case Fallado = 5;
    case Reintegrado = 6;
    case Cancelado = 7;  
}