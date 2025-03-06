<?php
// Será la clase principal para utilizar la herencia de métodos
namespace Model;
/**
 * Sirve para decir explícitamente que estas propiedades serán utilizadas
 * en los modelo que extiende de ActiveRecord indicando que estas propiedades si existen
 * 
 * @property int|null $id ID del registro en la base de datos
 * @property string|null $imagen_url URL de la imagen asociada
 */

class ActiveRecord{
    // Database
    protected static $db;
    protected static $columnDB =  []; // Columnas de la tabla
    protected static $tabla = ''; // Irá el nombre de la tabla


    // Errores
    protected static $errores = [];


    // Definir conexion a la bbdd
    public static function setDB($database){
        self::$db = $database;
    }

    // MÉTODOS
    public function guardar(){
        if( !is_null($this->id) ){
            $this->actualizar();
        }else{
            $this->insertar();
        }
    }

    public function actualizar(){
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        $values = [];
        foreach ($atributos as $key => $value) {
            $values[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$tabla  . " SET ";
        $query .= join(', ', $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        return $resultado;
    
    }
    
    public function insertar(){

        // Sanitizar datos
        $atributos = $this->sanitizarDatos();

        // Insertar en la tabla 
        $query = "INSERT INTO " . static::$tabla  . " ( ";
        $query .= join(', ', array_keys($atributos));  //Creo un string a partir de un array, devuelve todas las key
        $query .= " ) VALUES(' "; 
        $query .= join("', '", array_values($atributos)); //Creo un string a partir de un array, devuelve todos los value
        $query .= " ')";
        
        $resultado = self::$db->query($query);

        if (!$resultado) {
            throw new \Exception("Error al guardar el registro " . self::$db->error);
        }

        return $resultado;
    }

    
    // Eliminar registro de la tabla
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla  . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        
        $resultado = self::$db->query($query);

        if($resultado){
            $this->eliminarImagen();
        }
        
    }
    


    // identifica y une los atributos de la bbdd
    public function atributos(){
        $atributos = [];
        // Se van a ir mapeando los datos del objeto
        foreach(static::$columnDB as $column){
            // el Id no lo sanitiza ya que no se inserta
            if($column === 'id') continue;

            $atributos[$column] =  $this->$column;
        }
        return $atributos;
    }

    public function sanitizarDatos(){
        $atributos = $this->atributos();
        
        $sanitizado = [];
        // Creara un nuevo arreglo exacto ya sanitizado
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }


    // Validaciones
    public static function getErrores(){
        return static::$errores; // Devuelve una arreglo vacío al principio
    }

    public function validar(){
        static::$errores = [];
        return static::$errores; // Devolverá el array de errores en la clase que hereda
    }

    // Guardar la imagen
    public function setImagen($imagen){
        // Solo eliminar la imagen anterior si estamos actualizando una velada existente
        if(isset($this->id) && $this->imagen_url){
            $this->eliminarImagen();
        }

        if($imagen){
            $this->imagen_url = $imagen;
        }
    }

    // Elimina la imagen asociada a la velada
    public function eliminarImagen(){

        // Ruta de la imagen anterior
        $rutaImagen = CARPETA_IMAGENES . $this->imagen_url;
        //debuguear($rutaImagen);
        // Verificar si la imagen existe y es un archivo
        if(file_exists($rutaImagen) && is_file($rutaImagen)){
            unlink($rutaImagen); // Eliminar el archivo
        }
    }

    // Para obtener todas los registros de un usuario
    public static function all($id_usuario){ 
        // Devuelve un array asociativo
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id_usuario = $id_usuario";

        $resultado = self::consultaSQL($query);

        return $resultado;

    }
    // Para obtener todas los registros
    public static function todos(){ 
        // Devuelve un array asociativo
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultaSQL($query);

        return $resultado;

    }

    // Obtiene una velada por ID
    public static function find($id){
        $query= "SELECT * FROM " . static::$tabla  . " WHERE id = $id";

        $resultado = self::consultaSQL($query);

        return array_shift($resultado); // Devuelve el 1er elemento del arreglo
    }

    public static function consultaSQL($query){
        // Consulta la BBD
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array =[];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        // Liberamos memoria
        $resultado->free();

        // Retorna los resultados
        return $array;
        
    }

    // Convierte el array del resultado a un objeto
    protected static function crearObjeto($registro){
        $objeto = new static; // crea un nuevo objeto en la clase que se está heredando

        foreach($registro as $key => $value){
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }


    // Sincroniza el objeto en memoria con la actualiación de la velada
    public function sync($args = []){
        
        foreach($args as $key => $value){
            // Si la propiedad existe en el objeto actual
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}