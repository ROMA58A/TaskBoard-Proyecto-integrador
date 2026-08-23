<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$pdo = Conexion::obtener();
$stmt = $pdo->prepare(
    'INSERT INTO tareas (titulo, estado, urgente) VALUES (:titulo, :estado, :urgente)'
);
$stmt->execute([
    ':titulo' => 'Configurar conexion PDO',
    ':estado' => 'pendiente',
    ':urgente' => 0,
]);

echo 'Tarea guardada con ID: ' . $pdo->lastInsertId() . PHP_EOL;
