<?php

declare(strict_types=1);

namespace App\Modelo;

class Tarea
{
    protected string $titulo;
    protected string $estado;

    public function __construct(string $titulo, string $estado = 'pendiente')
    {
        $this->titulo = $titulo;
        $this->estado = $estado;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function marcarComoHecha(): void
    {
        $this->estado = 'hecho';
    }
}
