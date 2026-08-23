<?php

declare(strict_types=1);

namespace App\Modelo;

class Columna
{
    private string $titulo;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}
