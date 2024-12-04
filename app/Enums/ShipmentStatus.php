<?php

namespace App\Enums;

enum ShipmentStatus:int
{
    case Pendiente = 1;
    case Completado = 2;
    case Fallado = 3;
}