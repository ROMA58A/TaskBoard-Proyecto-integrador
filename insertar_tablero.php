<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$pdo = Conexion::obtener();
$pdo->beginTransaction();

try {
    $stmt = $pdo->prepare('INSERT INTO tableros (nombre) VALUES (:nombre)');
    $stmt->execute([':nombre' => 'Sprint 1 - Proyecto TaskBoard']);
    $tableroId = (int) $pdo->lastInsertId();

    $stmtColumna = $pdo->prepare(
        'INSERT INTO columnas (titulo, orden, tablero_id) VALUES (:titulo, :orden, :tablero_id)'
    );
    $columnas = [
        ['titulo' => 'Por hacer', 'orden' => 1],
        ['titulo' => 'En progreso', 'orden' => 2],
        ['titulo' => 'Hecho', 'orden' => 3],
    ];

    foreach ($columnas as $columna) {
        $stmtColumna->execute([
            ':titulo' => $columna['titulo'],
            ':orden' => $columna['orden'],
            ':tablero_id' => $tableroId,
        ]);
    }

    $pdo->commit();
    echo "Tablero creado con ID: {$tableroId}" . PHP_EOL;
    echo 'Columnas iniciales creadas correctamente.' . PHP_EOL;
} catch (Throwable $exception) {
    $pdo->rollBack();
    throw $exception;
}
