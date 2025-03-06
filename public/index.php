<?php
// La session estará iniciada globalmente
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Verificamos si estamos en el servidor de InfinityFree o en local
if ($_SERVER['HTTP_HOST'] == 'boxeoproject.free.nf') {
    //echo 'servidor';
    require_once __DIR__ . '/includes/app.php';
}else{
    //echo 'local';
    require_once __DIR__ . '/../includes/app.php';
}


use MVC\Router;
use Controllers\VeladaController;
use Controllers\BoxeadorController;
use Controllers\PaginasController;
use Controllers\LoginController;

// Utilizamos el Router
$router = new Router();

// Páginas Públicas del sitio
$router->get('/', [PaginasController::class, 'index']);
$router->get('/veladas', [PaginasController::class, 'veladas']);
$router->get('/velada', [PaginasController::class, 'velada']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada-1', [PaginasController::class, 'entrada_1']);
$router->get('/entrada-2', [PaginasController::class, 'entrada_2']);
$router->get('/entrada-3', [PaginasController::class, 'entrada_3']);    
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Páginas Privadas del sitio
$router->get('/admin', [VeladaController::class, 'index']);
$router->get('/veladas/crear', [VeladaController::class, 'crear']);
$router->post('/veladas/crear', [VeladaController::class, 'crear']);
$router->get('/veladas/actualizar', [VeladaController::class, 'actualizar']);
$router->post('/veladas/actualizar', [VeladaController::class, 'actualizar']);
$router->post('/veladas/eliminar', [VeladaController::class, 'eliminar']);

$router->get('/boxeadores/crear', [BoxeadorController::class, 'crear']);
$router->post('/boxeadores/crear', [BoxeadorController::class, 'crear']);
$router->get('/boxeadores/actualizar', [BoxeadorController::class, 'actualizar']);
$router->post('/boxeadores/actualizar', [BoxeadorController::class, 'actualizar']);
$router->post('/boxeadores/eliminar', [BoxeadorController::class, 'eliminar']);

// Login - Registro y Autenticación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/restablecer-contrasenia', [LoginController::class, 'restablecer_contrasenia']);
$router->post('/restablecer-contrasenia', [LoginController::class, 'restablecer_contrasenia']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
//debuguear($_SERVER['REDIRECT_URL']);