<?php 

// Función para hacer la conexión a la BBDD
function connectDB(): mysqli {
    // Conexión a la base de datos
    $db = new mysqli('localhost', 'root', '', 'boxeoproject_crud');

    // Verificar si hay errores en la conexión
    if ($db->connect_error) {
        echo "No se pudo conectar a la BBDD: " . $db->connect_error;
        exit; // Se detiene la ejecución si no se puede conectar
    }

    // Establecer el conjunto de caracteres a utf8mb4
    if (!$db->set_charset('utf8mb4')) {
        echo "Error al establecer el conjunto de caracteres: " . $db->error;
        exit;
    }

    return $db;
}