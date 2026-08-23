<?php

declare(strict_types=1);

namespace App\Basedatos;

use PDO;
use PDOException;

class Conexion
{
    public static function obtener(): PDO
    {
        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $database = getenv('DB_NAME') ?: 'taskboard';
        $user = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASSWORD') ?: '6313';
        $port = getenv('DB_PORT') ?: '3306';
        $dsn = "mysql:host={$host};port={$port};dbname={$database};charset=utf8mb4";

        try {
            return new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $exception) {
            throw new PDOException(
                'Error de conexion a la base de datos: ' . $exception->getMessage()
                    . ' Revisa MySQL y las variables DB_*.',
                (int) $exception->getCode(),
                $exception
            );
        }
    }
}
