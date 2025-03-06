<?php
    //Head
    $currentPage = 'crear boxeador';
    includeTemplate('head', $currentPage);
  
?>
<body>
    <!--Header-->
    <header class="header my-paddings">
        <!--Header content-->
        <div class="my-container header__content">
            <!--Header Nav-->
            <?php 
            includeTemplate('nav', $currentPage);
            ?>
            <!--/Header Nav-->
        </div><!--/Header content-->

        <!--Nav Mobile-->
        <?php 
            includeTemplate('nav-mobile', $currentPage);
        ?>
        <!--/Nav Mobile-->

    </header> <!--/Header-->

    <!--Main-->
    <main class="main interna">
        <h1 class="text-center">Registra tu Boxeador</h1>

        <!--Publicar velada-->
        <section class="registrar-boxeador my-container my-paddings">
            <div class="registrar-boxeador__info">
                <p class="my-2">
                Rellana los campos obligatorios (<span class="required">*</span>) para poder registrar correctamente a tu boxeador. 
                Esta información mínima es esencial para mostrar la información importante a los asistentes y aficionados.
                </p>

                <div class="to-back d-inline-block mt-5">
                    <a href="<?php echo BASE_URL;?>/admin" class="btn-back">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                        </svg>
                        <span>
                        Volver al Panel
                        </span>
                    </a>
                </div>
            </div>

            <!--Formulario-->
            <div class="registrar-boxeador__formulario">
                <form class="formulario boxeador-form" method="POST" action="<?php echo BASE_URL;?>/boxeadores/crear">

                    <!--Alert de exito-->
                    <?php if(isset($_SESSION['mensaje_exito'])) : ?>
                        <div class="formulario-alert boxeador-form__alert alert alert-success" role="alert">
                            <?php echo $_SESSION['mensaje_exito']; ?>
                        </div>
                        <?php unset($_SESSION['mensaje_exito']); // Limpiamos el mensaje de sesion ?>
                    <?php endif; ?>

                    <!-- Alerts errores -->
                    <?php foreach($errores as $error): ?>
                        <div class="formulario-alert boxeador-form__alert alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?>

                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                    
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="formulario-group boxeador-form__group--nombre">
                            <label for="nombre_boxeador">
                                Nombre <span class="required"> *</span>
                            </label>
                            <input 
                            type="text" 
                            id="nombre_boxeador" 
                            name="nombre_boxeador"  
                            placeholder="Ej. Pepito"
                            value="<?php echo $nombre_boxeador; ?>" 
                            >
                        </div>

                        <div class="formulario-group boxeador-form__group--apellido">
                            <label for="apellido_boxeador">
                                Apellido <span class="required"> *</span>
                            </label>
                            <input 
                            type="text" 
                            id="apellido_boxeador" 
                            name="apellido_boxeador" 
                            placeholder="Ej. Pérez"
                            value="<?php echo $apellido_boxeador; ?>" 
                            >
                        </div>
                        <div class="formulario-group boxeador-form__group--peso">
                            <label for="peso">
                                Peso (kg) <span class="required"> *</span>
                            </label>
                            <input 
                            type="number"  
                            id="peso" 
                            name="peso" 
                            placeholder="Ej. 60"
                            value="<?php echo $peso; ?>" 
                            >
                        </div>
                    </div>      

                    <input type="submit" class="formulario-submit boxeador-form__submit btn-gold-block" value="Registrar boxeador">

                </form>

            </div><!--/Formulario-->

        </section><!--/Publicar velada-->
        
    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>