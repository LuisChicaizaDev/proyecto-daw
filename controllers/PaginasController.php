<?php
namespace Controllers;
use MVC\Router;
use Model\Velada;
use Model\Boxeador;
use Model\Usuario;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){

        $veladas = Velada::numRegistros(6);
        $router->render('paginas/index', [
            'veladas' => $veladas
        ]);
    }
    public static function veladas(Router $router){
        
        $veladas = Velada::veladasByDesc();
        $router->render('paginas/veladas', [
            'veladas' => $veladas
        ]);
    }
    public static function velada(Router $router){

        $id = redireccionarValidar(BASE_URL . '/veladas');
        $nombre_usuario = Usuario::usuarioVelada($id);
        $correo_usuario =  Usuario::usuarioCorreo($id);

        $velada = Velada::find($id);

        // Datos boxeador perteneciente a la velada
        $resultado_boxeador = Boxeador::boxeadoresVelada($id);

        // Array para traducir los meses de ingles a español
        $meses = [
        'Jan' => 'Enero', 'Feb' => 'Febrero', 'Mar' => 'Marzo', 'Apr' => 'Abril', 
        'May' => 'Mayo', 'Jun' => 'Junio', 'Jul' => 'Julio', 'Aug' => 'Agosto',
        'Sep' => 'Septiembre', 'Oct' => 'Octubre', 'Nov' => 'Noviembre', 'Dec' => 'Diciembre'
        ];
        
        $router->render('paginas/velada', [
            'id' => $id,
            'velada' => $velada,
            'nombre_usuario' => $nombre_usuario,
            'correo_usuario' => $correo_usuario,
            'resultado_boxeador' => $resultado_boxeador,
            'meses' => $meses
        ]);
    }
    public static function blog(Router $router){
       
        $router->render('paginas/blog');
    }
    public static function entrada_1(Router $router){
        $router->render('paginas/entrada-1');
    }
    public static function entrada_2(Router $router){
        $router->render('paginas/entrada-2');
    }
    public static function entrada_3(Router $router){
        $router->render('paginas/entrada-3');
    }
    public static function contacto(Router $router){
        $errores = [];
        $nombre = $_POST['contacto']['nombre'] ?? '';
        $email = $_POST['contacto']['email'] ?? '';
        $telefono = $_POST['contacto']['telefono'] ?? '';
        $mensaje = $_POST['contacto']['mensaje'] ?? '';

        // Se ejecuta después de que se envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Validar el formulario
            if(empty($nombre)){
                $errores[] = 'El nombre es obligatorio';
            }
            if(empty($email)){
                $errores[] = 'El email es obligatorio';
            }
            if(empty($telefono)){
                $errores[] = 'El teléfono es obligatorio';
            }
            if(empty($mensaje)){
                $errores[] = 'El mensaje es obligatorio';
            }
            
            // Si no hay errores se envia el mensaje
            if (empty($errores)) {
            
                $_SESSION['mensaje_exito'] = 'El mensaje ha sido enviado exitosamente';
                
                header('Location: ' .  BASE_URL . '/contacto');
                exit;
                
            }

        }

        // Leer mensaje de éxito (si existe) y borrarlo
        $mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);

        $router->render('paginas/contacto', [
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'mensaje' => $mensaje,
            'errores' => $errores,
            'mensaje_exito' => $mensaje_exito
        ]);
    }
    
}