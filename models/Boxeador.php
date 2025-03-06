<?php 

namespace Model;

class Boxeador extends ActiveRecord{
    protected static $tabla = 'boxeador'; // Irá el nombre de la tabla
    protected static $columnDB = 
    ['id', 'nombre_boxeador', 'apellido_boxeador', 'peso', 'fecha_creado', 'id_usuario']; // Columnas de la tabla

    // Atributos
    public $id;
    public $nombre_boxeador;
    public $apellido_boxeador;
    public $peso;
    public $fecha_creado;
    public $id_usuario;

    // Constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_boxeador = $args['nombre_boxeador'] ?? '';
        $this->apellido_boxeador = $args['apellido_boxeador'] ?? '';
        $this->peso = $args['peso'] ?? '';
        $this->fecha_creado = date('Y-m-d');
        $this->id_usuario = $args['id_usuario'] ?? '';
    }


    // Consulta datos boxeadores pertenecientes a una velada por id_velada
    public static function boxeadoresVelada($id_velada){
        $query = "SELECT combate.id AS id_combate, boxeador.nombre_boxeador, boxeador.apellido_boxeador, boxeador.peso
        FROM boxeador
        INNER JOIN participar ON boxeador.id = participar.id_boxeador
        INNER JOIN combate ON combate.id = participar.id_combate
        INNER JOIN velada ON velada.id = combate.id_velada
        WHERE velada.id = $id_velada";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Obtener id veladas 
    public function veladasRelacionadas($id_boxeador) {
        $query = "SELECT velada.id AS id_velada
        FROM velada
        INNER JOIN combate ON velada.id = combate.id_velada
        INNER JOIN participar ON combate.id = participar.id_combate
        WHERE participar.id_boxeador = $id_boxeador";

        $resultado = self::$db->query($query);

        $veladas = [];
        while ($fila = $resultado->fetch_assoc()) {
            $veladas[] = $fila['id_velada'];
        }

        return $veladas; // Retorna un array con los IDs de las veladas relacionadas
    }


    public function validar(){
    
        if(!$this->nombre_boxeador){
            self::$errores[] = 'El nombre es obligatorio.';
        }

        if(!$this->apellido_boxeador){
            self::$errores[] = 'El apellido es obligatorio.';
        }

        if(!$this->peso){
            self::$errores[] = 'El peso es obligatorio.';
        }

        return self::$errores;
    }
}