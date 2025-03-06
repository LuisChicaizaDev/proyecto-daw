
<!--Cards veladas-->
<div class="container__veladas">
    <?php foreach($veladas as $velada ): 
        // Array para traducir los meses de ingles a español
        $meses = [
        'Jan' => 'Ene', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Abr', 
        'May' => 'May', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Ago',
        'Sep' => 'Sep', 'Oct' => 'Oct', 'Nov' => 'Nov', 'Dec' => 'Dic'
        ];
    ?>
    <!--Card velada-->
    <div class="velada__card">
        <div class="velada__image">
            <a href="<?php echo BASE_URL; ?>/velada?id=<?php echo $velada->id; ?>" class="velada__image--link">
                <div class="velada__date">
                    <span class="velada__day">
                        <?php 
                            $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha);
                            echo $fecha_formateada ? $fecha_formateada->format('d') : 'Fecha no válida';
                        ?>
                    </span>
                    <span class="velada__month">
                        <?php 
                            $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha);
                            if($fecha_formateada){
                                $mes_abreviado = $fecha_formateada->format('M');
                                echo $meses[$mes_abreviado];
                            }else{
                                echo 'fecha no válida';
                            }
                        ?>
                    </span>
                </div>

                <img width="800" height="800" loading="lazy" class="img-fluid" src="imagenes/<?php echo $velada->imagen_url; ?>" alt="Cartelera de Boxeo">
                
            </a>
        </div>

        <div class="velada__content">
            <div class="velada__title">
                <h3>
                    Velada <?php echo $velada->tipo; ?>
                </h3>
            </div>
            
            <div class="velada__details">
                <ul class="velada-icons__list">
                    <li class="icons__item">
                        <img loading="lazy" width="36" height="36" src="static/icon-calendar.svg" alt="Icono calendario">
                        <p>
                            <?php 
                                $fecha_formateada = DateTime::createFromFormat('Y-m-d', $velada->fecha);
                                echo $fecha_formateada ? $fecha_formateada->format('d/m/Y') : 'Fecha no válida';
                            ?>
                        </p>
                    </li>
                    <li class="icons__item">
                        <img loading="lazy" width="36" height="36" src="static/icon-time.svg" alt="Icono horario">
                        <p>
                            <?php 
                            $hora_formateada = DateTime::createFromFormat('H:i:s', $velada->hora);
                            echo $hora_formateada ? $hora_formateada-> format('H : i') : 'Hora no válida';
                            ?>
                        </p>
                    </li>
                    <li class="icons__item">
                        <img loading="lazy" width="36" height="36" src="static/icon-boxing-ring.svg" alt="Icono ring boxeo">
                        <p>
                            <?php echo $velada->lugar; ?>
                        </p>
                    </li>
                </ul>

                <div class="velada__footer mt-5 d-flex justify-content-between">
                    <div class="velada__price">
                        <span>desde</span>
                        <h4>
                            <?php 
                                $precio = $velada->precio;
                                echo intval($precio); // Elimino los decimales
                            ?> €
                        </h4>
                    </div>

                    <a class="velada__button d-flex align-items-center gap-3" href="<?php echo BASE_URL; ?>/velada?id=<?php echo $velada->id; ?>">
                        más info
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                            <path d="M12.7826 9.37085L17.3781 13.9674L12.7826 18.564L11.2507 17.0322L14.3144 13.9674L11.2507 10.9038L12.7826 9.37085Z" fill="currentColor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7726 2.05078C7.19137 2.05078 1.85596 7.3862 1.85596 13.9674C1.85596 20.5487 7.19137 25.8841 13.7726 25.8841C20.3539 25.8841 25.6893 20.5487 25.6893 13.9674C25.6893 7.3862 20.3539 2.05078 13.7726 2.05078ZM23.5226 13.9674C23.5226 12.6871 23.2704 11.4192 22.7804 10.2363C22.2905 9.05336 21.5723 7.97853 20.6669 7.07316C19.7615 6.16779 18.6867 5.44961 17.5038 4.95962C16.3209 4.46964 15.053 4.21745 13.7726 4.21745C12.4922 4.21745 11.2244 4.46964 10.0415 4.95962C8.85854 5.44961 7.7837 6.16779 6.87833 7.07316C5.97296 7.97853 5.25478 9.05336 4.7648 10.2363C4.27481 11.4192 4.02262 12.6871 4.02262 13.9674C4.02262 16.5533 5.04985 19.0333 6.87833 20.8617C8.70681 22.6902 11.1868 23.7174 13.7726 23.7174C16.3585 23.7174 18.8384 22.6902 20.6669 20.8617C22.4954 19.0333 23.5226 16.5533 23.5226 13.9674Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <?php endforeach; ?>
</div><!--/Cards veladas-->
