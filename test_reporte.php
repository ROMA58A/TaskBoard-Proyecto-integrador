<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Modelo\Tarea;
use App\Reporte\ContadorTareas;

$tareas = [
    new Tarea('Tarea 1'),
    new Tarea('Tarea 2'),
    new Tarea('Tarea 3', 'hecho'),
];

echo ContadorTareas::resumen($tareas) . PHP_EOL;
