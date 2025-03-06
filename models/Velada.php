<?php 
namespace Model;

class Velada extends ActiveRecord{
    protected static $tabla = 'velada'; // Irá el nombre de la tabla
    protected static $columnDB = 
    ['id', 'tipo', 'imagen_url', 'lugar', 'fecha', 'hora', 'direccion', 'precio', 'nombre_promotor', 'descripcion', 'fecha_publicada', 'id_usuario']; // Columnas de la tabla

    // Atributos
    public $id;
    public $tipo;
    public $imagen_url;
    public $lugar;
    public $fecha;
    public $hora;
    public $direccion;
    public $precio;
    public $nombre_promotor;
    public $descripcion;
    public $fecha_publicada;
    public $id_usuario;


    // Constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->imagen_url = $args['imagen_url'] ?? '';
        $this->lugar = $args['lugar'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->nombre_promotor = $args['nombre_promotor'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha_publicada = date('Y-m-d');
        $this->id_usuario = $args['id_usuario'] ?? '';
    }

    public function insertar(){
        // Llamo al método insertar de la clase Active Record para reutilizar el método
        parent::insertar(); 
        return static::$db->insert_id; // devuelve el ID de la velada recién insertada;
    }

    // Guarda las relaciones de COMBATES Y PARTICIPACIONES asociados a la velada
    public function guardarRelaciones($boxeadoresPorCombate): bool {
        // Primero guarda la velada
        $id_velada = $this->insertar();
        
        //debuguear($id_velada);

        if (!$id_velada) {
            throw new \Exception("Error al guardar la velada.");
        }
        
        // Guarda los combates y sus participantes
        foreach ($boxeadoresPorCombate as $combate) {
            // Verificar que que los combates no estén vacíos
            if (!empty($combate['boxeador1']) && !empty($combate['boxeador2'])) {

                $combateInstancia = new Combate([
                    'id_velada' => $id_velada, // se asiga el id de la velada recién creada
                    'boxeadores' => [$combate['boxeador1'], $combate['boxeador2']]
                ]);

                $combateInstancia->guardar(); 
            }
        }
        return true;
    }

    // Actualiza las relaciones de COMBATES Y BOXEADORES
    public function actualizarRelaciones($boxeadoresPorCombate): bool{
        // Elimino las relaciones previas
        $this->eliminarRelaciones();
        

        // Guarda los nuevos combates y sus participantes
        foreach ($boxeadoresPorCombate as $combate) {
            // Verificar que los combates no estén vacíos
            if (!empty($combate['boxeador1']) && !empty($combate['boxeador2'])) {
                
                $combateInstancia = new Combate([
                    'id_velada' => $this->id, // Le asigna el id velada que ya existe, ya fue creada
                    'boxeadores' => [$combate['boxeador1'], $combate['boxeador2']]
                ]);
                $combateInstancia->guardar();
            }

        }

        return true;

    }

    // Elimina COMBATE Y PARTICIPACIONES asociados a la velada
    public function eliminarRelaciones(){
        if(empty($this->id)){
            throw new \Exception("El ID de la velada es necesario para eliminar relaciones.");
        }

        $id_velada = static::$db->escape_string($this->id);

        // Elimina las participaciones
        $query_participaciones = "DELETE FROM participar WHERE id_combate IN 
        (SELECT id FROM combate WHERE id_velada = '$id_velada')";

        static::$db->query($query_participaciones);

        // Elimina los combates
        $query_combates = "DELETE FROM combate WHERE id_velada = '$id_velada'";

        static::$db->query($query_combates);
    }

    
    public function validar(){
        // validar tipo
        if($this->tipo && !preg_match('/^[A-Za-zÁÉÍÓÚÜáéíóúü]+(?: [A-Za-zÁÉÍÓÚÜáéíóúü]+)*$/u', $this->tipo)) {
            self::$errores[] = 'El nombre solo puede contener letras minúsculas, mayúsculas y tildes. Sin espacios al inicio o al final.';
        }
        //Valida la fecha
        if($this->fecha < $this->fecha_publicada){
            self::$errores[] = 'No puede publicar una velada con fecha anterior a la fecha actual.';
        }   

        // Validamos caracteres descripción
        if(strlen($this->descripcion) < 150){
            self::$errores[] = 'La descripción debe contener mínimo 150 caracteres.';
        }

        return self::$errores;
    }

    // Para obtener las veladas más recientes
    public static function veladasByDesc(){ 
        // Devuelve un array asociativo
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY fecha DESC";
        $resultado = self::consultaSQL($query);

        return $resultado;

    }
   
    // Obtiene determinado numero de registros ordenado DESC
    public static function numRegistros($limite){ 
        // Devuelve un array asociativo
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY fecha DESC LIMIT " . $limite;

        $resultado = self::consultaSQL($query);

        return $resultado;

    }
}