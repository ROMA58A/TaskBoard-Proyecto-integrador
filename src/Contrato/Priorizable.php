<?php

declare(strict_types=1);

namespace App\Contrato;

interface Priorizable
{
    public function getPrioridad(): string;
}
