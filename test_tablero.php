<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Modelo\Columna;
use App\Modelo\Tablero;

$tablero = new Tablero('Sprint 1');
$tablero->agregarColumna(new Columna('Por hacer'));
$tablero->agregarColumna(new Columna('En progreso'));
$tablero->agregarColumna(new Columna('Hecho'));

echo 'Tablero: ' . $tablero->getNombre() . PHP_EOL;
echo 'Columnas: ' . $tablero->contarColumnas() . PHP_EOL;
