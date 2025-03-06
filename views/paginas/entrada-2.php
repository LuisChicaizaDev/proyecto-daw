<?php 
    //Head
    $currentPage = 'Cómo adaptar el protector bucal a tu boca';
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
        <!--Entrada-->
        <section class="entrada my-container my-paddings">
            <h1>Cómo adaptar el protector bucal a tu boca</h1>

            <div class="entrada__content">
                <p class="blog__author mb-5">
                    Escrito el: <span>30/12/2024</span> por: <span>Admin</span>
                </p>
                <div class="entrada__image">
                    <picture>
                        <source srcset="assets/img/blog/protector-bucal-boxeo.webp" type="image/webp">
                        <source srcset="assets/img/blog/protector-bucal-boxeo.jpg" type="image/jpeg">
                        <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/protector-bucal-boxeo.jpg" alt="Protector bucal de boxeo">
                    </picture>
                </div>


                <div class="entrada__description">
                    <p class="my-4">
                        El protector bucal es un accesorio fundamental en el mundo del boxeo, este accesorio protege tus dientes y mandíbula durante los entrenamientos y combates. Para que su objetivo principal de proteger tus dientes funcione, se debe ajustar perfectamente a tu boca. En este artículo te explico cómo hacerlo de manera fácil y sencilla.
                    </p>
                </div>

                <h2 class="my-5">1. Elegir el bucal adecuado</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        A la hora de elegir el bucal, existen bucales prefabricados, moldeables y hechos a la medida. Para iniciar a practicar este deporte, los moldeables son una buena opción, ya que puedes ajustarlo a tu mandíbula y tener una mayor comodidad.
                    </p>
                    <p class="my-4">
                        Los bucales hechos a medida son mucho más frecuentes en boxeadores profesionales.
                    </p>
                </div>

                <h2 class="my-5">2. Pasos para moldearlo</h2>

                <div class="entrada__description">
                    <ul>
                        <li class="my-4">
                            <strong>Hervir agua</strong>: Calienta agua en una olla, lo suficiente para que cubra el bucal, déjala hervir y luego ponla en un recipiente.
                        </li>
                        <li class="my-4">
                            <strong>Introducir el bucal</strong>: Sumergir el bucal unos 10 - 15 segundos (o el tiempo que indique el fabricante) hasta que se ablande un poco.
                        </li>
                        <li class="my-4">
                            <strong>Moldearlo en tu boca</strong>: Saca el bucal con unas pinzas y déjalo enfriar un poco antes de colocarlo en tu boca. Cierra tu boca y presiona tus dientes para darle forma.
                        </li>
                        <li class="my-4">
                            <strong>Enfriar el bucal</strong>: Después de darle forma, sumérgelo en agua fría unos segundos para que quede fijo el molde de tu boca.
                        </li>
                    </ul>
                </div>

                <h2 class="my-5">3. Cuida tu bucal</h2>

                <div class="entrada__description">
                   <p class="my-4">
                        Es aconsejable limpiar tu bucal con agua tibia después de cada entrenamiento y guardarlo en el estuche, que esté ventilado. Así, evitarás que se acumulen bacterias.
                   </p>

                   <p class="my-4">
                        Un bucal bien amoldado a tu boca no solo te ofrece protección en tus dientes, sino también una mayor comodidad durante tus entrenamientos y combates. Sigue estos pasos y lograrás moldear tu bucal de manera fácil.
                   </p>
                </div>
               

            </div>
        </section>

        <!--Blog-->
        <section class="blog my-container my-paddings">
            <h2 class="text-center">Nuestro Blog</h2>

            <!--Container blog-->
            <div class="container__blog">

                <!--Card Blog 1-->
                <article class="blog__card">
                    <div class="blog__image">
                        <a href="<?php echo BASE_URL ?>/entrada-1" class="blog__image--link">
                            <picture>
                                <source srcset="assets/img/blog/guantes-boxeo.webp" type="image/webp">
                                <source srcset="assets/img/blog/guantes-boxeo.jpg" type="image/jpeg">
                                <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/guantes-boxeo.jpg" alt="Guantes de boxeo">
                            </picture>
                        </a>
                    </div>
                    <div class="blog__content">
                        <a href="<?php echo BASE_URL ?>/entrada-1">
                            <h3 class="blog__title">
                                Descubre cómo elegir los guantes perfectos
                            </h3>
                        </a>
                        <p class="blog__author">
                            Escrito el: <span>20/12/2024</span> por: <span>Admin</span>
                        </p>
                        <p class="blog__description">
                            Los guantes de boxeo no son simplemente un complemento necesario para practicar dicho deporte...
                        </p>
                    </div>
                </article>
                
                <!--Card Blog 3-->
                <article class="blog__card">
                    <div class="blog__image">
                        <a href="<?php echo BASE_URL ?>/entrada-3" class="blog__image--link">
                            <picture>
                                <source srcset="assets/img/blog/botas-boxeo.webp" type="image/webp">
                                <source srcset="assets/img/blog/botas-boxeo.jpg" type="image/jpeg">
                                <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/botas-boxeo.jpg" alt="Boxeadores con botas de boxeo">
                            </picture>
                        </a>
                    </div>
                    <div class="blog__content">
                        <a href="<?php echo BASE_URL ?>/entrada-3">
                            <h3 class="blog__title">
                                ¿Por qué deberías usar botas de boxeo? Entérate de sus ventajas
                            </h3>
                        </a>
                        <p class="blog__author">
                            Escrito el: <span>30/12/2024</span> por: <span>Admin</span>
                        </p>
                        <p class="blog__description">
                            Normalmente cuando se habla del equipamiento necesario para practicar boxeo, se suele pensar principalmente en...
                        </p>
                    </div>
                </article>

            </div><!--/Container blog-->

            <div class="more__blogs d-flex justify-content-center">
                <a href="<?php echo BASE_URL ?>/blog" class="btn-gold">Ver todo</a>
            </div>

        </section><!--/Blog-->

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>