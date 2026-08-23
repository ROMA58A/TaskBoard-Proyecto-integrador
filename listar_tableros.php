<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$pdo = Conexion::obtener();
$tableros = $pdo->query('SELECT * FROM tableros ORDER BY fecha_creacion DESC, id DESC')->fetchAll();

if ($tableros === []) {
    echo 'No hay tableros registrados.' . PHP_EOL;
}

$stmtColumna = $pdo->prepare(
    'SELECT titulo FROM columnas WHERE tablero_id = :tablero_id ORDER BY orden, id'
);

foreach ($tableros as $tablero) {
    echo sprintf('#%d - %s', $tablero['id'], $tablero['nombre']) . PHP_EOL;
    $stmtColumna->execute([':tablero_id' => $tablero['id']]);

    foreach ($stmtColumna->fetchAll() as $columna) {
        echo ' -> ' . $columna['titulo'] . PHP_EOL;
    }
}
