<?php 
namespace Controllers;
use MVC\Router; // El controlador manda a llamar a las vistas
use Model\Velada;
use Model\Boxeador; 
use Model\Combate; 
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class VeladaController{

    // Index del panel de control, le pasamos el router definido en el index
    public static function index(Router $router){
        //debuguear($_SESSION);
        // Datos del usuario que inició sesion
        $nombre_usuario = $_SESSION['nombre_usuario'];
        $id_usuario = $_SESSION['id_usuario'];

        $veladas = Velada::all($id_usuario);
        $boxeadores = Boxeador::all($id_usuario);

        $errores = [];

        // Leer mensaje de éxito (si existe) y borrarlo
        $mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);

        // Llama al método render del Router
        $router->render('veladas/admin', [
            'veladas' => $veladas,
            'boxeadores' => $boxeadores,
            'nombre_usuario' => $nombre_usuario,
            'errores' => $errores,
            'mensaje_exito' => $mensaje_exito
        ]);
    }

    // Creará la velada
    public static function crear(Router $router){
        $id_usuario = $_SESSION['id_usuario'];

        // Creo una instancia 
        $velada = new Velada;
        $boxeadores_resultado = Boxeador::all($id_usuario);

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
        $lugar = isset($_POST['lugar']) ? $_POST['lugar'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $hora = isset($_POST['hora']) ? $_POST['hora'] : '';
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $nombre_promotor = isset($_POST['nombre_promotor']) ? $_POST['nombre_promotor'] : '';
        $boxeadores = isset($_POST['boxeadores']) ? $_POST['boxeadores'] : [];
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

        $errores = Velada::getErrores();
        $participaciones = [];

        // Se ejecuta después de que se envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $boxeadores = $_POST['boxeadores']; 

            // Instanciamos la clase
            $velada = new Velada($_POST);

            // Nombres unicos para las imagenes
            $nombre_imagen = md5(uniqid(mt_rand(), true)) . '.webp';
            if($_FILES['imagen_cartelera']["tmp_name"]){
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['imagen_cartelera']["tmp_name"]); 

                $velada->setImagen($nombre_imagen);
            }
            
            //debuguear(CARPETA_IMAGENES);

            $errores = $velada->validar();

            // Cada combate debe tener boxeadores diferentes
            foreach ($boxeadores as $index => $combate) {
                // Obtenemos los boxeadores de cada combate
                $boxeador1 = $combate['boxeador1'];
                $boxeador2 = $combate['boxeador2'];


                // Ignorar completamente combates con ambos vacíos
                if (empty($boxeador1) && empty($boxeador2)) {
                    continue;
                }

                // Detectar combates parcialmente llenos
                if (empty($boxeador1) || empty($boxeador2)) {
                    $errores[] = "<strong>En el combate {$index}</strong>, debes seleccionar ambos boxeadores para completar el combate. O déjalo vacío seleccionando la primera opción.";
                    continue;
                }

                // Verificar que los boxeadores no sean los mismos
                if ($boxeador1 === $boxeador2) {
                    $errores[] = "<strong>En el combate " . $index . "</strong>, un boxeador no puede enfrentarse a sí mismo. Selecciona otro.";
                }

                // Verificar si el boxeador ya está participando en otro combate
                if (in_array($boxeador1, $participaciones)) {
                    $errores[] = "<strong>En el combate " . $index . "</strong>, el boxeador <b>1</b> ya está participando en otro combate.";
                }
                if (in_array($boxeador2, $participaciones)) {
                    $errores[] = "<strong>En el combate " . $index  . "</strong>, el boxeador <b>2</b> ya está participando en otro combate.";
                }

                // Agregar los boxeadores al array de participaciones
                $participaciones[] = $boxeador1;
                $participaciones[] = $boxeador2;
            }


            // Si no hay errores se insertar los datos
            if (empty($errores)) {
                
                // Si  no existe la carpeta la crea
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                // Guardar imagenes en el servidor
                $imagen->toWebp(80)->save(CARPETA_IMAGENES . $nombre_imagen);            

                
                // Se insertan datos en la velada, depues en combate y despues en participar
                $velada->guardarRelaciones($boxeadores);
                
                if ($velada) {

                    $_SESSION['mensaje_exito'] = '<strong>¡Tu velada ha sido publicada correctamente!</strong> <br> Puedes volver a tu Panel para ver todas tus veladas.';
                
                    header('Location: ' . BASE_URL .'/veladas/crear');
                    exit;
                } 

            }
        }

        // Leer mensaje de éxito (si existe) y borrarlo
        $mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);

        $router->render('veladas/crear', [
            'id_usuario' => $id_usuario,
            'velada' => $velada,
            'boxeadores_resultado' => $boxeadores_resultado,
            'errores' => $errores,
            'tipo' => $tipo,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'direccion' => $direccion,
            'precio' => $precio,
            'nombre_promotor' => $nombre_promotor,
            'boxeadores' => $boxeadores,
            'descripcion' => $descripcion,
            'mensaje_exito' => $mensaje_exito
        ]);

    }
    // Actualizará la velada
    public static function actualizar(Router $router){
        $id_usuario = $_SESSION['id_usuario'];

        $id = redireccionarValidar(BASE_URL . '/admin');

        $velada = Velada::find($id);
        $boxeadores_resultado = Boxeador::all($id_usuario);

        $combates = [];

        // Consulta el ID del boxeador que pertenece al id velada
        $result_combate = Combate::combateBoxeador($id);

        // Procesa los combates
        while ($combate_id = mysqli_fetch_assoc($result_combate)) {
            $id_combate = $combate_id['id_combate'];
            $id_boxeador = $combate_id['id_boxeador'];

            // Si no se ha inicializado el combate, lo inicializamos con dos posiciones nulas
            if (!isset($combates[$id_combate])) {
                $combates[$id_combate] = [
                    'boxeador1' => null,
                    'boxeador2' => null,
                ];
            }

            // Asignamos los boxeadores
            if ($combates[$id_combate]['boxeador1'] === null) {
                $combates[$id_combate]['boxeador1'] = $id_boxeador;
            } elseif ($combates[$id_combate]['boxeador2'] === null) {
                $combates[$id_combate]['boxeador2'] = $id_boxeador;
            }
        }
        
        /** @var Velada $velada se informa el tipo de dato que es (un objeto)*/ 
        $tipo = $velada->tipo;
        $imagen_cartelera = $velada->imagen_url;
        $lugar = $velada->lugar;
        $fecha = $velada->fecha;
        $hora = $velada->hora;
        $direccion = $velada->direccion;
        $precio = $velada->precio;
        $nombre_promotor = $velada->nombre_promotor;
        $boxeadores = [];
        $descripcion = $velada->descripcion;

        $errores = Velada::getErrores();
        $participaciones = [];

        // Se ejecuta después de que se envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $boxeadores = $_POST['boxeadores']; 
            
            // Recoger datos del formulario
            $args = $_POST['velada'];

            // Sincroniza los datos del formulario
            $velada->sync($args);
            

            // Validar los datos
            $errores = $velada->validar();
        
            
            // Subida de archivos
            // Para evitar errores si no se sube una nueva
            $imagen = null;

            // Nombres unicos para las imagenes
            $nombre_imagen = md5(uniqid(mt_rand(), true)) . '.webp';
            if($_FILES['velada'] ["tmp_name"] ['imagen_cartelera']){
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['velada'] ["tmp_name"] ['imagen_cartelera']); 

                $velada->setImagen($nombre_imagen);
            } 

            
            // Cada combate debe tener boxeadores diferentes
            foreach ($boxeadores as $index => $combate) {
                // Obtenemos los boxeadores de cada combate
                $boxeador1 = $combate['boxeador1'];
                $boxeador2 = $combate['boxeador2'];


                // Ignorar completamente combates con ambos vacíos
                if (empty($boxeador1) && empty($boxeador2)) {
                    continue;
                }

                // Detectar combates parcialmente llenos
                if (empty($boxeador1) || empty($boxeador2)) {
                    $errores[] = "<strong>En el combate {$index}</strong>, debes seleccionar ambos boxeadores para completar el combate. O déjalo vacío seleccionando la primera opción.";
                    continue;
                }

                // Verificar que los boxeadores no sean los mismos
                if ($boxeador1 === $boxeador2) {
                    $errores[] = "<strong>En el combate " . $index . "</strong>, un boxeador no puede enfrentarse a sí mismo. Selecciona otro.";
                }

                // Verificar si el boxeador ya está participando en otro combate
                if (in_array($boxeador1, $participaciones)) {
                    $errores[] = "<strong>En el combate " . $index . "</strong>, el boxeador <b>1</b> ya está participando en otro combate.";
                }
                if (in_array($boxeador2, $participaciones)) {
                    $errores[] = "<strong>En el combate " . $index  . "</strong>, el boxeador <b>2</b> ya está participando en otro combate.";
                }

                // Agregar los boxeadores al array de participaciones
                $participaciones[] = $boxeador1;
                $participaciones[] = $boxeador2;
            }


            // Si no hay errores se insertar los datos
            if (empty($errores)) {
                
               // Si  no existe la carpeta la crea
               if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                // Guardar la imagen en el servidor solo si se ha definido
                if ($imagen !== null) {
                    $imagen->toWebp(80)->save(CARPETA_IMAGENES . $nombre_imagen);   
                }          

                
                $velada->guardar(); 

                $velada->actualizarRelaciones($boxeadores);

                
                if ($velada) {
                    $_SESSION['mensaje_exito'] = '<strong>¡Tu velada ha sido actualizada correctamente!</strong> <br> Puedes volver a tu Panel para ver todas tus veladas.';
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                    exit;
                } 

            }
        }

        // Leer mensaje de éxito (si existe) y borrarlo
        $mensaje_exito = $_SESSION['mensaje_exito'] ?? null;
        unset($_SESSION['mensaje_exito']);


        $router->render('/veladas/actualizar', [
            'velada' => $velada,
            'boxeadores_resultado' => $boxeadores_resultado,
            'combates' => $combates,
            'result_combate' => $result_combate,
            'errores' => $errores,
            'tipo' => $tipo,
            'imagen_cartelera' => $imagen_cartelera,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'direccion' => $direccion,
            'precio' => $precio,
            'nombre_promotor' => $nombre_promotor,
            'boxeadores' => $boxeadores,
            'descripcion' => $descripcion,
            'mensaje_exito' => $mensaje_exito
        ]);

    }

    // Eliminará la velada
    public static function eliminar(){

        // Se ejecuta cuando se envia formulario por POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); // Validamos que el id sea un entero
            
            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipo($tipo)){

                    // Obtiene la velada
                    $velada = Velada::find($id);

                    // Elimina la velada
                    $velada->eliminar();

                    if($velada){
                        $_SESSION['mensaje_exito'] = '<strong>Tu velada ha sido eliminada correctamente.</strong>';
                    
                        header('Location: ' .  BASE_URL .'/admin');
                        exit;
                    }
                   
                }
                
            }

        }
    }
}