#!/bin/bash
# set -x  # Activa la depuración

# Directorio del proyecto (directorio actual)
DIR="$(cd "$(dirname "$0")" && pwd)"

# Verifica si se pasó un argumento
MENSAJE=${1:-}

# Ejecuta el script PHP con entrada por stdin si se proporciona
if [ -n "$MENSAJE" ]; then
    echo "$MENSAJE" | php "$DIR/test.php"
else
    # Envía una línea vacía a stdin para evitar que PHP se quede esperando
    echo "" | php "$DIR/test.php"
fi
