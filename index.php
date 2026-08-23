<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Modelo\Tarea;
use App\Modelo\TareaUrgente;

$tarea = new Tarea('Investigar PDO');
$tareaUrgente = new TareaUrgente('Corregir bug en login');

echo "--- Tarea normal ---" . PHP_EOL;
echo $tarea->getTitulo() . ' (' . $tarea->getEstado() . ')' . PHP_EOL;
echo "--- Tarea urgente ---" . PHP_EOL;
echo $tareaUrgente->getTitulo() . ' - Prioridad: ' . $tareaUrgente->getPrioridad() . PHP_EOL;

$tarea->marcarComoHecha();
echo "--- Despues de marcarla como hecha ---" . PHP_EOL;
echo $tarea->getTitulo() . ' (' . $tarea->getEstado() . ')' . PHP_EOL;
