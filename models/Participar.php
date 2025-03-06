<?php 
namespace Model;

class Participar extends ActiveRecord{
    
    protected static $tabla = 'participar'; // Irá el nombre de la tabla
    protected static $columnDB = ['id_combate', 'id_boxeador']; // Columnas de la tabla

    // Atributos
    public $id_combate;
    public $id_boxeador;

    public function __construct($args = []){
        $this->id_combate = $args['id_combate'] ?? null;
        $this->id_boxeador = $args['id_boxeador'] ?? null;
    }
}