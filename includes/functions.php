<?php
// Definimos unas constantes
// Verificamos si estamos en el servidor de InfinityFree o en local
if ($_SERVER['HTTP_HOST'] == 'boxeoproject.free.nf') {
    // Configuración para el servidor de InfinityFree
    //echo 'servidor';
    define('BASE_URL', '');
    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCTIONS_URL', __DIR__ . '/functions.php');
    define('CARPETA_IMAGENES', dirname(__DIR__) . '/imagenes/');
} else {
    // Configuración para el entorno local
    //echo 'Local';
    define('BASE_URL', '/boxeoproject/public');
    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCTIONS_URL', __DIR__ . '/functions.php');
    define('CARPETA_IMAGENES', dirname(__DIR__) . '/public/imagenes/');
}


// Pasamos el nombre del template y la página actual a la función
function includeTemplate(string $template, string $currentPage ){    
    include TEMPLATES_URL . "/$template.php";
}

// Función para verificar la autenticación del usuario
function isAuthenticated(): bool {
    // Para usa variables de sesion
    session_start();

    $auth = $_SESSION['login'];

    if($auth){
        return true;
    }
    
    return false;

}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';

    exit;
}

// Validará si elimnar velada o boxeador
function validarTipo($tipo){
    $tipos = ['velada', 'boxeador'];

    return in_array($tipo, $tipos);
}

// Validará o redireccionar (a la $url) si el id no es válido para editar
function redireccionarValidar($url){
    // Validamos el ID de la velada
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ' . $url .'');   
    }

    return $id;
}