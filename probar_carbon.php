<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

$hoy = Carbon::now();
$vencimiento = Carbon::parse('2026-08-25');

echo 'Hoy es: ' . $hoy->toDateString() . PHP_EOL;
echo 'La tarea vence: ' . $vencimiento->toDateString() . PHP_EOL;
echo 'Dias restantes: ' . (int) round($hoy->diffInDays($vencimiento)) . PHP_EOL;
echo 'En palabras: vence ' . $vencimiento->diffForHumans() . PHP_EOL;
