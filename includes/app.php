<?php
// requerimos las funciones
require 'functions.php';
// requerimos la conexion a la bbdd
require 'config/database.php';
// requerimos las clases
require __DIR__ . '/../vendor/autoload.php';

// Conexion a la BBDD de las clases
$db = connectDB();

// Instanciamos la clase ActiveRecord y le pasamos la conexion a la BBDD
use Model\ActiveRecord;;
ActiveRecord::setDB($db);



