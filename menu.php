<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Basedatos\Conexion;

function leerEntrada(string $mensaje): string
{
    echo $mensaje;
    $entrada = fgets(STDIN);
    return $entrada === false ? '' : trim($entrada);
}

function mostrarMenu(): void
{
    echo PHP_EOL . '=== TaskBoard CLI ===' . PHP_EOL;
    echo '1. Listar tareas' . PHP_EOL;
    echo '2. Crear tarea' . PHP_EOL;
    echo '3. Marcar tarea como hecha' . PHP_EOL;
    echo '4. Eliminar tarea' . PHP_EOL;
    echo '5. Salir' . PHP_EOL;
}

$pdo = Conexion::obtener();

while (true) {
    mostrarMenu();
    $opcion = leerEntrada('> ');

    switch ($opcion) {
        case '1':
            $tareas = $pdo->query('SELECT id, titulo, estado FROM tareas ORDER BY id')->fetchAll();
            if ($tareas === []) {
                echo 'No hay tareas registradas.' . PHP_EOL;
                break;
            }
            foreach ($tareas as $tarea) {
                echo sprintf('#%d - %s (%s)', $tarea['id'], $tarea['titulo'], $tarea['estado']) . PHP_EOL;
            }
            break;

        case '2':
            $titulo = leerEntrada('Titulo de la nueva tarea: ');
            if ($titulo === '' || strlen($titulo) > 150) {
                echo 'El titulo es obligatorio y debe tener como maximo 150 caracteres.' . PHP_EOL;
                break;
            }
            $stmt = $pdo->prepare('INSERT INTO tareas (titulo, estado) VALUES (:titulo, :estado)');
            $stmt->execute([':titulo' => $titulo, ':estado' => 'pendiente']);
            echo 'Tarea creada con ID: ' . $pdo->lastInsertId() . PHP_EOL;
            break;

        case '3':
            $id = filter_var(leerEntrada('ID de la tarea a marcar como hecha: '), FILTER_VALIDATE_INT);
            if ($id === false || $id < 1) {
                echo 'El ID debe ser un numero positivo.' . PHP_EOL;
                break;
            }
            $stmt = $pdo->prepare('UPDATE tareas SET estado = :estado WHERE id = :id');
            $stmt->execute([':estado' => 'hecho', ':id' => $id]);
            echo $stmt->rowCount() > 0
                ? "Tarea #{$id} marcada como hecha." . PHP_EOL
                : 'No se encontro ninguna tarea con ese ID.' . PHP_EOL;
            break;

        case '4':
            $id = filter_var(leerEntrada('ID de la tarea a eliminar: '), FILTER_VALIDATE_INT);
            if ($id === false || $id < 1) {
                echo 'El ID debe ser un numero positivo.' . PHP_EOL;
                break;
            }
            $stmt = $pdo->prepare('DELETE FROM tareas WHERE id = :id');
            $stmt->execute([':id' => $id]);
            echo $stmt->rowCount() > 0
                ? "Tarea #{$id} eliminada." . PHP_EOL
                : 'No se encontro ninguna tarea con ese ID.' . PHP_EOL;
            break;

        case '5':
            echo 'Hasta luego!' . PHP_EOL;
            exit(0);

        default:
            echo 'Opcion no valida, intenta de nuevo.' . PHP_EOL;
    }
}
