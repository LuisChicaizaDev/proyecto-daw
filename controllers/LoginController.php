<?php
namespace Controllers;
use MVC\Router;
use Model\Usuario;

class LoginController{
    public static function login(Router $router){

        $nombre = '';
        $email = '';
        $contrasenia = '';
        $confirm_contrasenia = '';

        $email_acceder = '';
        $contrasenia_acceder = '';

        $errores = [];
        $errores_acceder = [];

        // Login y Autenticar al usuario
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //debuguear($_POST);
            $auth = new Usuario($_POST);

            // Identificar el formulario enviado
            $form_type = $_POST['form_type'];

            // Validar formulario para iniciar sesión
            if($form_type === 'acceder'){
                $email_acceder = $_POST['email_acceder'];
                $contrasenia_acceder = $_POST['contrasenia_acceder']; 

                // Validaciones para el acceso
                if (empty($email_acceder)) {
                    $errores_acceder[] = 'El correo es obligatorio.';
                }
                if (!empty($email_acceder) && !filter_var($email_acceder, FILTER_VALIDATE_EMAIL)) {
                    $errores_acceder[] = 'El correo introducido no es válido.';
                }
                if (empty($contrasenia_acceder)) {
                    $errores_acceder[] = 'La contraseña es obligatoria.';
                }

                if(empty($errores_acceder)){
                    // Validamos las credenciales del usuario
                    $usuario = $auth->existeUsuario($email_acceder);

                    if (!$usuario) {
                        // El usuario no existe en la base de datos
                        $errores_acceder[] = 'El usuario con este correo electrónico no existe.';
                    }else{

                        // Validamos la contraseña ingresada con la de la bbdd
                        if($usuario ->validarContrasenia($contrasenia_acceder)){
                            // El usuario ha sido autenticado
                            $usuario->autenticar();
                            $_SESSION['mensaje_exito'] = '<strong>¡Bienvenido a tu Panel de Control!</strong>';
                            header('Location: ' . BASE_URL . '/admin');
                            exit;
                        }else{
                            $errores_acceder[] = 'La contraseña es incorrecta.';
                        }

                        
                    }
                    
                }
            }elseif($form_type === 'registro'){

                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $contrasenia = $_POST['contrasenia'];
                $confirm_contrasenia = $_POST['comfirm_contrasenia'];

                // Campos vacíos
                if(empty($nombre)){
                    $errores[] = 'El nombre es obligatorio.';
                } 
                
                if(empty($email)){
                    $errores[] = 'El correo es obligatorio.';
                } 
                if(empty($contrasenia)){
                    $errores[] = 'La contraseña es obligatoria.';
                } 
                if(!empty($contrasenia) && empty($confirm_contrasenia)){
                    $errores[] = 'Confirma la contraseña.';
                } 

                // Validar nombre - Permite más de un nombre y letras de la A-Z y con tildes(/u)
                if (!empty($nombre) && !preg_match('/^[A-Za-zÁÉÍÓÚÜáéíóúü]+(?: [A-Za-zÁÉÍÓÚÜáéíóúü]+)*$/u', $nombre)) {
                    $errores[] = 'El nombre solo puede contener letras minúsculas, mayúsculas y tildes.';
                }

                if(!empty($nombre) && strlen($nombre) < 4){
                    $errores[] = 'El nombre debe tener al menos 4 caracteres.';
                }

                // Validar email
                if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errores[] = 'El correo introducido no es valido.';
                }

                // Validar contraseñas iguales
                if(!empty($confirm_contrasenia) && $contrasenia !== $confirm_contrasenia){
                    $errores[] = 'Las contraseñas no coinciden.';
                }

                // Validar longitud contraseña
                if(!empty($contrasenia) && strlen($contrasenia) < 8){
                    $errores[] = 'La contraseña debe tener al menos 8 caracteres.';
                }

                if (!empty($contrasenia) && !preg_match('/^(?=.*[A-Z])(?=.*[\W_]).+$/', $contrasenia)) {
                    $errores[] = 'La contraseña debe contener al menos una letra mayúscula y un carácter especial (!@#$%^&*.,)';
                }

                // Si no hay errorres procede a hashear la contraseña
                if(empty($errores)){
                    $registrer = new Usuario;

                    // Encriptar contraseña
                    $hash_contrasenia = $registrer->hashearContrasenia($confirm_contrasenia);

                    // Crear una instancia del usuario
                    $registrer = new Usuario([
                        'nombre_usuario' => $nombre,
                        'correo' => $email,
                        'contrasenia' => $hash_contrasenia
                    ]);

                    // Verificar si el correo ya está registrado
                    if ($registrer->existeCorreo()) {
                        $errores[] = 'El correo electrónico ya está registrado con otro usuario.';
                        $_SESSION['error_registro'] = '¡Ups! Hubo un error al registrar el usuario. Vuelve al formulario.';
                    } else {
                        // Registrar el usuario
                        if ($registrer->insertar()) {
                            $_SESSION['mensaje_exito'] = '<strong>¡Tu usuario ha sido registrado correctamente!</strong> <br> Inicia sesión para publicar tus veladas.';
                            header('Location: ' . BASE_URL . '/login');
                            exit;
                        }
                    }
                }
            }
            
        }

        // Leer mensaje de éxito (si existe) y borrarlo
        $mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);

        // Leer mensaje de éxito (si existe) y borrarlo
        $error_registro = $_SESSION['error_registro'] ?? null;
        unset($_SESSION['error_registro']);

        $router->render('auth/login', [
            'nombre' => $nombre,
            'email'=> $email,
            'contrasenia' => $contrasenia,
            'email_acceder' => $email_acceder,
            'contrasenia_acceder' => $contrasenia_acceder,
            'confirm_contrasenia' => $confirm_contrasenia,
            'errores' => $errores,
            'errores_acceder' => $errores_acceder,
            'mensaje_exito' => $mensaje_exito,
            'error_registro' => $error_registro
        ]);
    }


    // Restablecer la contraseña
    public static function restablecer_contrasenia(Router $router){

        $email = '';
        $contrasenia = '';
        $confirm_contrasenia = '';



        $errores = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];
            $confirm_contrasenia = $_POST['comfirm_contrasenia'];
            

            // Campos vacíos            
            if(empty($email)){
                $errores[] = 'El correo es obligatorio.';
            } 
            if(empty($contrasenia)){
                $errores[] = 'La nueva contraseña es obligatoria.';
            } 
            if(!empty($contrasenia) && empty($confirm_contrasenia)){
                $errores[] = 'Confirma la contraseña.';
            } 

            // Validar email
            if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errores[] = 'El correo introducido no es valido.';
            }

            // Validar contraseñas iguales
            if(!empty($confirm_contrasenia) && $contrasenia !== $confirm_contrasenia){
                $errores[] = 'Las contraseñas no coinciden.';
            }

            // Validar longitud contraseña
            if(!empty($contrasenia) && strlen($contrasenia) < 8){
                $errores[] = 'La contraseña debe tener al menos 8 caracteres.';
            }

            if (!empty($contrasenia) && !preg_match('/^(?=.*[A-Z])(?=.*[\W_]).+$/', $contrasenia)) {
                $errores[] = 'La contraseña debe contener al menos una letra mayúscula y un carácter especial (!@#$%^&*.,)';
            }

            // Si no hay errores
            if(empty($errores)){
                
                $auth = new Usuario(['correo' => $email]); // Asigno el email al atributo del modelo usuario
            
                // Valida el usuario
                if(!$auth->existeCorreo()){
                    $errores[] = 'El usuario con este correo electrónico no existe.';
                }else{
                     // Encriptar contraseña
                    $hash_contrasenia = $auth->hashearContrasenia($contrasenia);

                    $actualizado = $auth->reestablecerContrasenia($hash_contrasenia);

                    if ($actualizado) {
                        $_SESSION['mensaje_exito'] = '<strong>¡Contraseña actualizada correctamente!</strong>';
                        header('Location: ' . BASE_URL . '/restablecer-contrasenia');
                        exit;
                    } else {
                        $errores[] = 'Hubo un problema al actualizar la contraseña. Inténtalo nuevamente.';
                    }

                }

            }

        }

        $router->render('auth/restablecer-contrasenia', [
            'email'=> $email,
            'contrasenia' => $contrasenia,
            'confirm_contrasenia' => $confirm_contrasenia,
            'errores' => $errores
        ]);
    }

    public static function logout(){
        // No iniciamos la sesión ya que está iniciada globalmente en el index
        $_SESSION = []; // Limpiamos la sesion
        session_destroy(); // Destrozamos la sesión
        header('Location: ' . BASE_URL . '/');
        exit;
       
    }
}