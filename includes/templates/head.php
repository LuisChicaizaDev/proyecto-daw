<?php 
    // Transformamos la variable a capitalize 
    $currentPage =  ucfirst($currentPage);
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxeo Project <?php echo '| ' . $currentPage?> </title>
    <!--Bootstrap library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/css/main.css">
    <meta name="description" content="Sitio web para publicar veladas de boxeo. Promociona tus eventos de manera fácil y sencilla para mantener informados a los aficionados a este deporte.">
    <meta name="author" content="Luis Chicaiza">
    <!--Favicon-->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL;?>/static/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL;?>/static/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>/static/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL;?>/static/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Boxeo Project" />
    <link rel="manifest" href="<?php echo BASE_URL;?>/static/favicon/site.webmanifest" />
</head>