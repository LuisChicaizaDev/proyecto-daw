<?php 
namespace MVC;

class Router{

    // Atributos
    public $rutasGET = [];
    public $rutasPOST = [];


    public function get($url, $funcion){
        $this->rutasGET[$url] = $funcion;
    }
    public function post($url, $funcion){
        $this->rutasPOST[$url] = $funcion;
    }

    public function comprobarRutas(){
        // La session ya está iniciada globalmente
        $auth = $_SESSION['login'] ?? null;

        // Array de las rutas protegidas
        $rutasProtegidas = [
            '/admin',
            '/veladas/crear',
            '/veladas/actualizar',
            '/veladas/eliminar',
            '/boxeadores/crear',
            '/boxeadores/actualizar',
            '/boxeadores/eliminar'
        ];
        
        // Obtener la URL actual desde REQUEST_URI
        $urlActual = $_SERVER['REDIRECT_URL'] ?? '/';

        // Eliminar el prefijo '/boxeoproject/public/' de la URL
        $urlActual = str_replace('/boxeoproject/public', '', $urlActual);
        //debuguear($urlActual);
        $metodo = $_SERVER['REQUEST_METHOD'];
    
        if($metodo == 'GET'){
            $funcion = $this->rutasGET[$urlActual] ?? null;
        }else{
            $funcion = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas -  Si no está autenticado no puede ver las rutas protegidas
        if(in_array($urlActual, $rutasProtegidas) && !$auth ){
            header('Location: ' . BASE_URL . '/');
        }


        if($funcion){
            // La URL existe y hay una función asociada
            // Llamará a una función cuando no se sabe que función es, las funciones son dinámicas irán cambiando
            call_user_func($funcion, $this);
        }else{
            echo 'página no encontrada';
        }
    }

    // Muestra una vista
    public function render($view, $datos = []){

        // Itera sobre los datos y generará variables con el nombre de los keys que estamos pasando hacia la vista
        foreach($datos as $key => $value){
            $$key = $value;
        }

        include __DIR__ . '/views/' . $view .'.php';
    }

}