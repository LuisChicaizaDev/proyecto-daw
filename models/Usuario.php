<?php 
namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuario'; // Irá el nombre de la tabla
    protected static $columnDB = 
    ['id', 'nombre_usuario', 'correo', 'contrasenia', 'rol', 'fecha_creado']; // Columnas de la tabla

    protected static $errores_acceder = [];
    // Atributos
    public $id;
    public $nombre_usuario;
    public $correo;
    public $contrasenia;
    public $rol;
    public $fecha_creado;

    // Constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->contrasenia = $args['contrasenia'] ?? '';
        $this->rol = 'usuario';
        $this->fecha_creado = date('Y-m-d');
    }

    
    // Validar si existe el usuario
    public function existeUsuario($email_acceder) {
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . self::$db->escape_string($email_acceder) . "' LIMIT 1";
        $resultado = self::$db->query($query);
    
        if ($resultado->num_rows) {
            $datos_usuario = $resultado->fetch_assoc();
            return new Usuario($datos_usuario); // Retorna una instancia del modelo
        }
    
        return false; // No existe el usuario
    }

    // Validar la contraseña con el usuario ya autenticado
    public function validarContrasenia($contrasenia_acceder) {
        return password_verify($contrasenia_acceder, $this->contrasenia); // Retorna true o false
    }
    

    // Autenticar al usuario
    public function autenticar(){
        session_start();

        // Llenar el arreglo de session
        $_SESSION['usuario'] = $this->correo;
        $_SESSION['nombre_usuario'] = $this->nombre_usuario;
        $_SESSION['id_usuario'] = $this->id;
        $_SESSION['login'] = true;
    }

    // Verificar si el correo ya está registrado
    public function existeCorreo() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . self::$db->escape_string($this->correo) . "' LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado->num_rows > 0; // Retorna true si el correo ya existe
    }

    // Hashear la contraseña
    public function hashearContrasenia($confirm_contrasenia) {
        $hash_contrasenia = password_hash($confirm_contrasenia, PASSWORD_BCRYPT);
        return $hash_contrasenia;
    }

    // Reestablecer contraseña
    public function reestablecerContrasenia($nueva_contrasenia) {
        $query = "UPDATE " . self::$tabla . " SET contrasenia = '" . self::$db->escape_string($nueva_contrasenia) . "' WHERE correo = '" . self::$db->escape_string($this->correo) . "' LIMIT 1";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    // Saber nombre que usuario publicó la velada
    public static function usuarioVelada($id_velada){
        $query = "SELECT nombre_usuario FROM " . self::$tabla . " INNER JOIN velada ON usuario.id = velada.id_usuario WHERE velada.id = $id_velada";
        $resultado = self::$db->query($query);
    
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            return $usuario['nombre_usuario']; // Devolver solo el nombre_usuario
        }
    
        return null;
    }    
    // Saber el correo del usuario publicó la velada
    public static function usuarioCorreo($id_velada){
        $query = "SELECT correo FROM " . self::$tabla . " INNER JOIN velada ON usuario.id = velada.id_usuario WHERE velada.id = $id_velada";
        $resultado = self::$db->query($query);
    
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            return $usuario['correo']; // Devolver solo el correo
        }
    
        return null;
    }    

}