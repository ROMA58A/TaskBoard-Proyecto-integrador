<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

$pdo = Conexion::obtener();
echo 'Conexion exitosa a la base de datos taskboard!' . PHP_EOL;
echo 'Driver activo: ' . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . PHP_EOL;
