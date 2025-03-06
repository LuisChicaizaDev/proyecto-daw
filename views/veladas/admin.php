<?php
    //Head
    $currentPage = 'administrador';
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
        <h1 class="text-center">Panel de Control</h1>

        <!--Info Panel -->
        <section class="panel-info my-container my-paddings">
            <h2 class="panel-info__title mb-5">
                ¡Hola 
                <span class="panel-info__name">
                    <?php 
                        echo $nombre_usuario; 
                    ?>!
                </span>
            </h2>

            <p class="panel-info__text">
                <strong>Bienvenido al Panel de Administrador</strong>.  Desde aquí podrás gestionar todos los aspectos de tus veladas de boxeo. 
                <strong>Agrega, edita, actualiza o elimina veladas y boxeadores fácilmente</strong> , manteniendo siempre actualizada la información de los eventos y competidores.  
            </p>

            <div class="alert alert-primary mt-5 d-inline-block" role="alert">
                ⚠️ Antes de publicar una velada, asegúrate de haber registrado previamente a tus boxeadores/as.
            </div>

            <!--Alert de exito-->
            <?php if (!empty($mensaje_exito)) : ?>
                <div class="formulario-alert alert alert-success" role="alert">
                    <?php echo $mensaje_exito; ?>
                </div>
            <?php endif; ?>

            <!-- Alerts errores -->
            <?php if($errores):
                foreach($errores as $error): ?>
                <div class="formulario-alert alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endforeach; ?>
            <?php  endif; ?>

            <?php if (!empty($_SESSION['mensaje_error'])) : ?>
                <div class="formulario-alert alert alert-danger" role="alert">
                    <?php echo $_SESSION['mensaje_error']; ?>
                </div>
                <?php unset($_SESSION['mensaje_error']); // Limpia el mensaje después de mostrarlo ?>
            <?php endif; ?>

            <!--Tabs-->
            <div class="panel-info__tabs">
                <ul class="nav nav-tabs tabs-listing">
                    <li class="nav-tabs__item">
                        <a href="#veladas" class="nav-link active">Veladas</a>
                    </li>
                    <li class="nav-tabs__item">
                        <a href="#boxeadores" class="nav-link">Boxeadores</a>
                    </li>
                </ul>
            </div><!--Tabs-->

        </section><!--/Info Panel -->


        <!--Lista de veladas-->
        <section class="veladas tab-section my-container my-paddings" id="veladas">
            <!--CRUD Veladas-->
            <section class="crud-veladas">
                <a href="<?php echo BASE_URL;?>/veladas/crear" class="crud-veladas__btn-add btn-turquoise">Nueva velada</a>
            </section><!--/CRUD Veladas-->

            <div class="lista-velada">
                <div class="lista-layout">
                    <div class="lista-header">
                        <div class="lista-header__item d-none d-lg-block">
                            ID
                        </div>
                        <div class="lista-header__item">
                            Imagen
                        </div>
                        <div class="lista-header__item d-none d-lg-block">
                            Tipo Velada
                        </div>
                        <div class="lista-header__item">
                            Lugar
                        </div>
                        <div class="lista-header__item  d-none d-md-block">
                            Fecha
                        </div>
                        <div class="lista-header__item">
                            Acciones
                        </div>
                        
                    </div>
                    
                    <!-- 4. Mostramos los resultados -->
                    <div class="lista-body">
                        <!-- Si no tiene veladas el usuario muestra un mensaje -->
                        <?php 
                            if (empty($veladas)): ?>
                            <div class="text-center my-5 no-results">
                                <p>Aún no tienes ninguna velada. Empieza por crear una nueva.</p>
                            </div>

                        <?php else: ?>
                            <?php foreach ( $veladas as $velada ):?>
                                <!--ID-->
                                <div class="lista-body__item d-none d-lg-block">
                                    <?php echo $velada->id; ?>
                                </div>
                                <!--img-->
                                <div class="lista-body__item">
                                    <a href="<?php echo BASE_URL;?>/velada?id=<?php echo  $velada->id; ?>" class="lista-body__link--image">
                                        <img src="<?php echo BASE_URL;?>/imagenes/<?php echo $velada->imagen_url; ?>" 
                                        alt="Imagen cartelera" class="lista-body__image mx-auto d-block img-fluid shadow">
                                    </a>
                                </div>
                                <!--tipo-->
                                <div class="lista-body__item d-none d-lg-block">
                                    <?php echo $velada->tipo; ?>
                                </div>
                                <!--lugar-->
                                <div class="lista-body__item">
                                    <?php echo $velada->lugar; ?>
                                </div>
                                <!--fecha-->
                                <div class="lista-body__item  d-none d-md-block">
                                    <?php 
                                    $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha);
                                    echo $fecha_formateada ? $fecha_formateada->format('d/m/Y') : 'Fecha no válida';
                                    ?>
                                </div>
                                <!--acciones-->
                                <div class="lista-body__item d-flex justify-content-evenly flex-wrap gap-1">
                                    <a href="<?php echo BASE_URL; ?>/veladas/actualizar?id=<?php echo $velada->id;  ?>" class="btn-editar" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <rect x="0.5" y="0.5" width="31" height="31" rx="7.5" fill="white" stroke="#002147"/>
                                            <path d="M19 10L22 13M17 24H25M9 20L8 24L12 23L23.586 11.414C23.9609 11.0389 24.1716 10.5303 24.1716 10C24.1716 9.46967 23.9609 8.96106 23.586 8.586L23.414 8.414C23.0389 8.03906 22.5303 7.82843 22 7.82843C21.4697 7.82843 20.9611 8.03906 20.586 8.414L9 20Z" stroke="#002147" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>
                                            Editar
                                        </span> 
                                    </a>
                                    <form method="POST" class="form-eliminar btn-eliminar my-0" action="<?php echo BASE_URL; ?>/veladas/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $velada->id; ?>">
                                        <input type="hidden" name="tipo" value="velada">

                                        <span class="btn-eliminar__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                <rect x="0.5" y="0.5" width="31" height="31" rx="7.5" fill="#D33939" stroke="#D33939"/>
                                                <path d="M22 13L21.16 21.398C21.033 22.671 20.97 23.307 20.68 23.788C20.4257 24.2114 20.0516 24.55 19.605 24.761C19.098 25 18.46 25 17.18 25H14.82C13.541 25 12.902 25 12.395 24.76C11.948 24.5491 11.5736 24.2106 11.319 23.787C11.031 23.307 10.967 22.671 10.839 21.398L10 13M17.5 19.5V14.5M14.5 19.5V14.5M8.5 10.5H13.115M13.115 10.5L13.501 7.828C13.613 7.342 14.017 7 14.481 7H17.519C17.983 7 18.386 7.342 18.499 7.828L18.885 10.5M13.115 10.5H18.885M18.885 10.5H23.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section><!--/Lista de veladas-->

        <!--Lista de boxeadores-->
        <section class="veladas tab-section my-container my-paddings" id="boxeadores">
            <!--CRUD BOXEADORES-->
            <section class="crud-veladas">
                <a href="<?php echo BASE_URL;?>/boxeadores/crear" class="crud-veladas__btn-add btn-turquoise">Nuevo boxeador</a>
            </section><!--/CRUD BOXEADORES-->

            <div class="lista-velada">
                <div class="lista-layout">
                    <div class="lista-header">
                        <div class="lista-header__item d-none d-lg-block">
                            ID
                        </div>
                        <div class="lista-header__item">
                            Nombre
                        </div>
                        <div class="lista-header__item">
                            Apellido
                        </div>
                        <div class="lista-header__item d-none d-md-block">
                            Peso
                        </div>
                        <div class="lista-header__item d-none d-lg-block">
                            Fecha Registro
                        </div>
                        <div class="lista-header__item">
                            Acciones
                        </div>
                        
                    </div>
                    
                    <!-- 4. Mostramos los resultados -->
                    <div class="lista-body">
                        <!-- Si no tiene veladas el usuario muestra un mensaje -->
                        <?php 
                            if (empty($boxeadores)): ?>
                            <div class="text-center my-5 no-results">
                                <p>Aún no tienes ningún boxeador registrado. Empieza por crear uno nuevo.</p>
                            </div>

                        <?php else: ?>
                            <?php foreach ( $boxeadores as $boxeador ):?>
                                <!--ID-->
                                <div class="lista-body__item d-none d-lg-block">
                                    <?php echo $boxeador->id; ?>
                                </div>
                                <!--nombre-->
                                <div class="lista-body__item">
                                    <?php echo $boxeador->nombre_boxeador; ?>
                                </div>
                                <!--apellido-->
                                <div class="lista-body__item ">
                                <?php echo $boxeador->apellido_boxeador; ?>
                                </div>
                                <!--peso-->
                                <div class="lista-body__item d-none d-md-block">
                                    <?php 
                                        $peso = $boxeador->peso;
                                    ?>
                                    <?php echo intval($peso); ?> kg
                                </div>
                                <!--fecha creacion-->
                                <div class="lista-body__item  d-none d-lg-block">
                                    <?php 
                                    $fecha_formateada = DateTime::createFromFormat('Y-m-d', $boxeador->fecha_creado);
                                    echo $fecha_formateada ? $fecha_formateada->format('d/m/Y') : 'Fecha no válida';
                                    ?>
                                </div>
                                <!--acciones-->
                                <div class="lista-body__item d-flex justify-content-evenly flex-wrap gap-1">
                                    <a href="<?php echo BASE_URL; ?>/boxeadores/actualizar?id=<?php echo $boxeador->id;  ?>" class="btn-editar" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <rect x="0.5" y="0.5" width="31" height="31" rx="7.5" fill="white" stroke="#002147"/>
                                            <path d="M19 10L22 13M17 24H25M9 20L8 24L12 23L23.586 11.414C23.9609 11.0389 24.1716 10.5303 24.1716 10C24.1716 9.46967 23.9609 8.96106 23.586 8.586L23.414 8.414C23.0389 8.03906 22.5303 7.82843 22 7.82843C21.4697 7.82843 20.9611 8.03906 20.586 8.414L9 20Z" stroke="#002147" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>
                                            Editar
                                        </span> 
                                    </a>
                                    <form method="POST" class="form-eliminar btn-eliminar my-0" action="<?php echo BASE_URL; ?>/boxeadores/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $boxeador->id; ?>">
                                        <input type="hidden" name="tipo" value="boxeador">

                                        <span class="btn-eliminar__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                <rect x="0.5" y="0.5" width="31" height="31" rx="7.5" fill="#D33939" stroke="#D33939"/>
                                                <path d="M22 13L21.16 21.398C21.033 22.671 20.97 23.307 20.68 23.788C20.4257 24.2114 20.0516 24.55 19.605 24.761C19.098 25 18.46 25 17.18 25H14.82C13.541 25 12.902 25 12.395 24.76C11.948 24.5491 11.5736 24.2106 11.319 23.787C11.031 23.307 10.967 22.671 10.839 21.398L10 13M17.5 19.5V14.5M14.5 19.5V14.5M8.5 10.5H13.115M13.115 10.5L13.501 7.828C13.613 7.342 14.017 7 14.481 7H17.519C17.983 7 18.386 7.342 18.499 7.828L18.885 10.5M13.115 10.5H18.885M18.885 10.5H23.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section><!--/Lista de boxeadores-->

    </main><!--/Main-->

<?php
    include __DIR__ . '/../../includes/templates/footer.php';
?>