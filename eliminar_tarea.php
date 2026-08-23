<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$id = filter_var($argv[1] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    fwrite(STDERR, "Uso: php eliminar_tarea.php <id>" . PHP_EOL);
    exit(1);
}

$pdo = Conexion::obtener();
$stmt = $pdo->prepare('DELETE FROM tareas WHERE id = :id');
$stmt->execute([':id' => $id]);

echo 'Filas eliminadas: ' . $stmt->rowCount() . PHP_EOL;
