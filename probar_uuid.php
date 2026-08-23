<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4();
echo 'ID de la nueva tarea: ' . $uuid->toString() . PHP_EOL;
