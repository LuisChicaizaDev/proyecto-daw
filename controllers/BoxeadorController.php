<?php 
namespace Controllers;
use MVC\Router; // El controlador manda a llamar a las vistas
use Model\Boxeador; 

class BoxeadorController{
    // Creará el boxeador
    public static function crear(Router $router){
        $id_usuario = $_SESSION['id_usuario'];
        $boxeador = new Boxeador;

        $nombre_boxeador = isset($_POST['nombre_boxeador']) ? $_POST['nombre_boxeador'] : '';
        $apellido_boxeador = isset($_POST['apellido_boxeador']) ? $_POST['apellido_boxeador'] : '';
        $peso = isset($_POST['peso']) ? $_POST['peso'] : '';

        // Se ejecuta después de que se envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nueva instancia
            $boxeador = new Boxeador($_POST);

            // Validar el formulario
            $errores = $boxeador->validar();

            // Si no hay errores
            if (empty($errores)) {

                $boxeador->guardar();
                
                if ($boxeador) {

                    $_SESSION['mensaje_exito'] = '<strong>¡Tu boxeador ha sido registrado correctamente!</strong> <br> Puedes volver a tu Panel para ver todos tus boxeadores.';
                
                    header('Location: ' . BASE_URL .'/boxeadores/crear');
                    exit;
                } 

            }


        }

        $errores = Boxeador::getErrores();

        $router->render('/boxeadores/crear', [
            'id_usuario' => $id_usuario,
            'boxeador' => $boxeador,
            'nombre_boxeador' => $nombre_boxeador,
            'apellido_boxeador' => $apellido_boxeador,
            'peso' => $peso,
            'errores' => $errores
        ]);
    }
    // Actualizará el boxeador
    public static function actualizar(Router $router){
        
        $id = redireccionarValidar(BASE_URL . '/admin');

        // Obtener el array del boxeador
        $boxeador = Boxeador::find($id);

        $errores = Boxeador::getErrores();

        // Se ejecuta después de que se envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignamos los valores 
            $args = $_POST['boxeador'];
            

            // Sincronizamos el objeto en memoria
            $boxeador->sync($args);

            // Validar
            $errores = $boxeador->validar();
            
            // Si no hay errores se actualiza
            if(empty($errores)){
                $boxeador->guardar();

                if ($boxeador) {
                    $_SESSION['mensaje_exito'] = '<strong>¡Tu boxeador ha sido actualizado correctamente!</strong> <br> Puedes volver a tu Panel para ver todos tus boxeadores.';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                } 
            }
        }

        $router->render('/boxeadores/actualizar',[
            'id' => $id,
            'boxeador' => $boxeador,
            'errores' => $errores
        ]);
    }
    // Eliminará el boxeador
    public static function eliminar(){
        
        // Se ejecuta cuando se envia formulario por POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); // Validamos que el id sea un entero
            
            $errores = [];
        
            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipo($tipo)){

                    // Obtiene la velada
                    $boxeador = Boxeador::find($id);

                    //debuguear($boxeador);

                     // Verifica si el boxeador pertenece a alguna velada
                    /** @var \Model\Boxeador $boxeador */
                    $veladas = $boxeador->veladasRelacionadas($id);

                        if (!empty($veladas)) { 
                            // Si el boxeador pertenece a veladas, muestra un mensaje de error
                            $_SESSION['mensaje_error'] = 'No puedes eliminar este boxeador porque pertenece a la velada con ID: ' . implode(', ', $veladas);
                            header('Location: ' .  BASE_URL .'/admin');
                            exit;
                        } else {
                            // Elimina el boxeador
                            $boxeador->eliminar();

                            if($boxeador){
                                $_SESSION['mensaje_exito'] = '<strong>Tu boxeador ha sido eliminado correctamente.</strong>';
                            
                                header('Location: ' .  BASE_URL .'/admin');
                                exit;
                            }
                        }
                        
                    }
                
                }

            }

    }
}