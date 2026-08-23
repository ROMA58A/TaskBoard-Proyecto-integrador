<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$pdo = Conexion::obtener();
$stmt = $pdo->prepare('SELECT * FROM tareas WHERE estado = :estado ORDER BY id');
$stmt->execute([':estado' => 'pendiente']);
$tareas = $stmt->fetchAll();

if ($tareas === []) {
    echo 'No hay tareas pendientes.' . PHP_EOL;
}

foreach ($tareas as $tarea) {
    echo sprintf('#%d - %s', $tarea['id'], $tarea['titulo']) . PHP_EOL;
}
