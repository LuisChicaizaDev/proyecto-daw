<?php 
namespace Model;

class Combate extends ActiveRecord{
    protected static $tabla = 'combate'; // Irá el nombre de la tabla
    protected static $columnDB = ['id', 'id_velada']; // Columnas de la tabla

    // Atributos
    public $id;
    public $id_velada;
    public $boxeadores = []; // Guardará el ID de los boxeadores participantes

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->id_velada = $args['id_velada'] ?? null;
        $this->boxeadores = $args['boxeadores'] ?? [];
    }

    public function guardar(){
        if (empty($this->id_velada)) {
            throw new \Exception("El ID de velada es obligatorio para crear un combate.");
        }

        // Insertar en la tabla COMBATE
        $this->insertar(); // método de la clase Active Record

        // Obtenemos el ID del combate insertado
        $this->id = static::$db->insert_id;

        // Insertar los participantes solo si el combate fue insertado correctamente
        if (empty($this->id)) {
            throw new \Exception("Error al obtener el ID del combate.");
        }

        // Guardar las participaciones de los boxeadores
        foreach ($this->boxeadores as $boxeador) {
            // Validar que el ID del boxeador no sea nulo
            if (empty($boxeador)) {
                throw new \Exception("ID de boxeador inválido.");
            }

            $participacionInstancia = new Participar([
                'id_combate' => $this->id, // se asiga el id del combate recién insertado
                'id_boxeador' => $boxeador
            ]);

            $participacionInstancia->insertar();
        }

        return true;

    }

    // Consulta el ID del boxeador que pertenece al id velada
    public static function combateBoxeador($id_velada){
       $query =  "SELECT combate.id AS id_combate, boxeador.id AS id_boxeador
            FROM combate
            INNER JOIN participar ON combate.id = participar.id_combate
            INNER JOIN boxeador ON participar.id_boxeador = boxeador.id
            WHERE combate.id_velada = $id_velada";

        $resultado = self::$db->query($query);

        return $resultado;
    }
    
}