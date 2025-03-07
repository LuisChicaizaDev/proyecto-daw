<?php
    //Head
    $currentPage = 'velada';
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
    <main class="main interna-details">
        <h1 class="text-center text-capitalize">
            Velada <?php echo $velada->tipo;?>
        </h1>

        <section class="my-container my-paddings">
            <h2 class="velada__heading">
                <?php echo $velada->lugar;?>
            </h2>

            <div class="velada-header">
                <div class="velada-author">
                    <p class="fw-bold">
                        Publicada el: 
                        <span class="velada-author__date">
                            <?php 
                                $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha_publicada);
                                echo $fecha_formateada ? $fecha_formateada->format('d/m/Y') : 'Fecha no válida';
                            ?>
                        </span> 
                        por: <span class="velada-author__name">
                            <?php echo $nombre_usuario; ?>
                        </span>
                    </p>
                </div>
                <div class="velada-header__image">
                     
                    <img loading="lazy" src="imagenes/<?php echo $velada->imagen_url;?>" 
                    alt="Cartelera de Boxeo <?php echo $velada->tipo;?>" class="shadow">

                </div>
                <div class="velada-header__details shadow">
                    <h3 class="text-center mb-5">
                        Detalles
                    </h3>
                    <ul class="velada-icons__list">
                        <li class="icons__item">
                            <img loading="lazy" width="32" height="32" src="static/icon-calendar.svg" alt="Icono calendario">
                            <p>
                                <?php 
                                    $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha);
                                    if($fecha_formateada){
                                        $dia = $fecha_formateada->format('d');
                                        $mes = $fecha_formateada->format('M');
                                        $anio = $fecha_formateada->format('Y');

                                        echo $dia . ' de ' . $meses[$mes] . ' de ' . $anio;
                                    }else{
                                        echo 'fecha no válida';
                                    }
                                ?>
                            </p>
                        </li>
                        <li class="icons__item">
                            <img loading="lazy" width="32" height="32" src="static/icon-time.svg" alt="Icono horario">
                            <p>
                                <?php 
                                    $hora_formateada = DateTime::createFromFormat('H:i:s', $velada->hora);
                                    echo $hora_formateada ? $hora_formateada-> format('H : i') : 'Hora no válida';
                                ?>
                            </p>
                        </li>
                        <li class="icons__item">
                            <img loading="lazy" width="32" height="32" src="static/icon-location.svg" alt="Icono ubicación">
                            <p>
                                <?php echo $velada->direccion; ?>
                            </p>
                        </li>
                        <li class="icons__item">
                            <img loading="lazy" width="32" height="32" src="static/icon-price.svg" alt="Icono precio">
                            <p>
                                desde 
                                <span class="velada__price">
                                    <?php 
                                        $precio = $velada->precio;
                                        echo intval($precio); // Elimino los decimales
                                    ?> €
                                </span> 
                            </p>
                        </li>
                        <li class="icons__item">
                            <p>
                                Organizado por: <span class="velada__promotor fw-bold">
                                    <?php echo $velada->nombre_promotor; ?>
                                </span> 
                            </p>
                        </li>
                        <li class="icons__item">
                            <a href="mailto: <?php echo $correo_usuario; ?>" class="velada-autor__correo">
                                Contactar con <span class="velada-author__name fw-bold">
                                    <?php echo $nombre_usuario; ?>
                                </span> 
                            </a>
                        </li>
                        <?php 
                            $id_velada = $_SERVER["REQUEST_URI"];
                            $link_velada = "https://boxeoproject.free.nf" . $id_velada;
                            if ($_SERVER['HTTP_HOST'] == 'boxeoproject.free.nf') : 
                        ?>
                        <li class="icons__item">
                            <a href="https://api.whatsapp.com/send?text=¡Hola!😊Te%20comparto%20esta%20velada%20de%20boxeo🥊.%20Si%20quieres%20más%20información%20puedes%20mirarlo%20en%20este%20enlace👉%20<?php echo urlencode($link_velada); ?>"  
                            target="_blank" class="compartir-whatsapp d-flex align-items-center gap-2">
                                <img loading="lazy" width="26" height="26" src="static/icon-whatsapp.svg" alt="Icono de WhatsApp">
                                <p>
                                    Compartir en WhatsApp
                                </p>
                            </a>
                        </li>
                        <li class="icons__item">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($link_velada); ?>"  
                            target="_blank" class="compartir-facebook d-flex align-items-center gap-2">
                                <img loading="lazy" width="26" height="26" src="static/icon-facebook.svg" alt="Icono de Facebook">
                                <p>
                                    Compartir en Facebook
                                </p>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="icons__item">
                            <a href="javascript:void(0);alert('Esta opción estará disponible en producción para compartir en WhatsApp🚀')"  
                            class="compartir-whatsapp d-flex align-items-center gap-2">
                                <img loading="lazy" width="26" height="26" src="static/icon-whatsapp.svg" alt="Icono de WhatsApp">
                                <p>
                                    Compartir en WhatsApp
                                </p>
                            </a>
                        </li>
                        <li class="icons__item">
                            <a href="javascript:void(0);alert('Esta opción estará disponible en producción para compartir en Facebook🚀')"  
                            class="compartir-facebook d-flex align-items-center gap-2">
                                <img loading="lazy" width="26" height="26" src="static/icon-facebook.svg" alt="Icono de Facebook">
                                <p>
                                    Compartir en Facebook
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!--Combates-->
                <div class="velada__fights">

                    <h2>Combates</h2>
                    
                    <?php 
                        // Array para agrupar a los boxeadores por combate
                        $combates = [];
                        while($boxeador = mysqli_fetch_assoc($resultado_boxeador) ){
                            // combates será un array con la key será id_combate que contendra un array con boxeadores
                            $combates[$boxeador['id_combate']][] = $boxeador;  
                        }
                        /* echo '<pre>';
                        var_dump($combates);
                        echo '</pre>';   */
                            
                    ?>
                    <!--Combate -->
                    <div class="velada__fight">
                        <ul class="list-combate">
                            <?php 
                                // Agrupamos los boxeadores en parejas de dos
                                foreach ($combates as $id_combate => $boxeadores): 
                            ?>
                            <li class="list-combate__item">
                                <div class="velada__fight-icon">
                                    <img loading="lazy" width="32" height="32" src="static/icon-boxing-glove.svg" alt="Icono guante de boxeo">
                                </div>
                                 
                                <?php if (count($boxeadores) === 2): ?>
                                <!--Boxeador1-->
                                <div class="velada__boxer velada__boxer--1">
                                    <p class="velada-boxer__name">
                                        <?php echo $boxeadores[0]['nombre_boxeador'] . ' ' . $boxeadores[0]['apellido_boxeador'] ; ?>
                                        <span class="velada-boxer__weight"> 
                                            <?php 
                                                $peso = $boxeadores[0]['peso'];
                                            ?>
                                            (<?php echo intval($peso); ?>Kg)
                                        </span>
                                    </p>
                                </div>

                                <div class="velada__versus">
                                    <p>
                                        vs
                                    </p>
                                </div>
                                
                                <!--Boxeador2-->
                                <div class="velada__boxer velada__boxer--2">
                                    <p class="velada-boxer__name">
                                        <?php echo $boxeadores[1]['nombre_boxeador'] . ' ' . $boxeadores[1]['apellido_boxeador'] ; ?>
                                        <span class="velada-boxer__weight"> 
                                            <?php 
                                                $peso = $boxeadores[1]['peso'];
                                            ?>
                                            (<?php echo intval($peso); ?>Kg)
                                        </span>
                                    </p>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php 
                                endforeach; 
                            ?>
                        </ul>
                    </div>

                </div><!--/Combates-->
            </div>


            <!--Description-->
            <div class="velada__description">
                <h2 class="mb-5">Descripción</h2>

                <p>
                     <?php echo $velada->descripcion; ?>
                </p>

            </div><!--/Description-->

        </section>

        <!--Contact-->
        <section class="contact-image">
            <div class="contact__info my-container my-paddings">
                <h2>
                    Promociona tus veladas
                </h2>
                <p>
                    Mantén informados a los aficionados al boxeo de tus veladas con toda la información en un solo lugar. 
                </p>

                <a href="<?php echo BASE_URL ?>/contacto" class="btn-gold">Contáctanos</a>
            </div>
        </section><!--/Contact-->

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>