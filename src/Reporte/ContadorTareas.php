<?php

declare(strict_types=1);

namespace App\Reporte;

use App\Modelo\Tarea;

class ContadorTareas
{
    /** @param Tarea[] $tareas */
    public static function resumen(array $tareas): string
    {
        $pendientes = 0;
        $hechas = 0;

        foreach ($tareas as $tarea) {
            if (!$tarea instanceof Tarea) {
                continue;
            }

            if ($tarea->getEstado() === 'pendiente') {
                $pendientes++;
            } elseif ($tarea->getEstado() === 'hecho') {
                $hechas++;
            }
        }

        return sprintf(
            'Total: %d | Pendientes: %d | Hechas: %d',
            count($tareas),
            $pendientes,
            $hechas
        );
    }
}
