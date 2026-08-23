<?php

declare(strict_types=1);

namespace App\Modelo;

class Tablero
{
    private string $nombre;
    private array $columnas = [];

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function agregarColumna(Columna $columna): void
    {
        $this->columnas[] = $columna;
    }

    public function contarColumnas(): int
    {
        return count($this->columnas);
    }
}
