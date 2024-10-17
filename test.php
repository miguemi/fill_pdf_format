<?php

// Intentamos leer desde stdin con un timeout (para evitar bloqueos)
$stdin = fopen("php://stdin", "r");

// Leemos la entrada si está disponible
$entrada = stream_get_contents($stdin);
fclose($stdin);

// Si hay entrada, la usamos, si no, imprimimos "Hola Mundo"
if (!empty($entrada)) {
    echo json_encode(['mensaje' => "Recibido: " . trim($entrada)]) . PHP_EOL;
} else {
    echo json_encode(['mensaje' => 'Hola Mundo']) . PHP_EOL;
}
?>
