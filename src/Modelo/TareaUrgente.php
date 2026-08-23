<?php

declare(strict_types=1);

namespace App\Modelo;

use App\Contrato\Priorizable;

class TareaUrgente extends Tarea implements Priorizable
{
    private string $prioridad;

    public function __construct(string $titulo, string $prioridad = 'alta')
    {
        parent::__construct($titulo);
        $this->prioridad = $prioridad;
    }

    public function getPrioridad(): string
    {
        return $this->prioridad;
    }
}
