<?php
    $currentPage = 'inicio';
    includeTemplate('head', $currentPage);
?>

<body>

    <!--Header-->
    <header class="header my-paddings home-bg">
        <div class="banner-bg-overlay"></div>
        <!--Header content-->
        <div class="my-container header__content"> 
            <!--Header Nav-->
            <?php 
            includeTemplate('nav', $currentPage);
            ?>
            <!--/Header Nav-->

            <div class="header__text">
                <h1>
                    Descubre las Mejores Veladas de Boxeo
                </h1>
                <p>
                    En este portal encontrarás eventos desde peleas amateur hasta combates profesionales, todo en un solo lugar.
                </p>
            </div>
        </div><!--/Header content-->

        <!--Nav Mobile-->
        <?php 
            includeTemplate('nav-mobile', $currentPage);
        ?>
        <!--/Nav Mobile-->

    </header> <!--/Header-->

    <!--Main-->
    <main class="main">
        <!--Intro-->
        <section class="intro my-container my-paddings">
            <h2 class="text-center">Proyecto</h2>

            <div class="intro__info">
                <div class="intro__image">
                    <picture>
                        <source srcset="assets/img/gimnasio-boxeo.webp" type="image/webp">
                        <source srcset="assets/img/gimnasio-boxeo.jpg" type="image/jpeg">
                        <img width="800" height="660" loading="lazy" class="img-fluid" src="assets/img/gimnasio-boxeo.jpg" alt="Gimnasio de Boxeo de Aitor Nieto">
                    </picture>
                </div>
    
                <div class="intro__text">
                    <h3>
                        Portal para promocionar veladas de boxeo 
                    </h3>
                    <p class="mt-3">
                        Este sitio web es el resultado de unir mi gusto por el <strong>boxeo y la programación</strong>, decidí aprovechar mi formación en Desarrollo de Aplicaciones Web para crear algo significativo y útil.
                    </p>
                    <p class="mt-3">
                        Aquí podrás encontrar una <strong>plataforma dedicada a promocionar veladas de boxeo</strong>, desde veladas amateurs hasta profesionales.
                    </p>
                </div>
            </div>
        </section><!--/Intro-->

        <!--Container Veladas-->
        <section class="veladas my-container my-paddings">
            <h2 class="text-center">Carteleras de Boxeo</h2>

            <?php  
                // Se incluyen las veladas
                include 'listados.php';
            ?>

            <div class="more-veladas text-end">
                <a href="<?php echo BASE_URL ?>/veladas" class="btn-gold">
                    Ver todas las veladas
                </a>
            </div>
        </section><!--/Cards Veladas-->

        <!--Contact-->
        <section class="contact-image">
            <div class="contact__info my-container my-paddings">
                <h2>
                    Promociona tus veladas
                </h2>
                <p>
                    Mantén informados a los aficionados al boxeo de tus veladas con toda la información en un solo lugar
                </p>

                <a href="<?php echo BASE_URL ?>/contacto" class="btn-gold">Contáctanos</a>
            </div>
        </section><!--/Contact-->

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
                <!--Card Blog 2-->
                <article class="blog__card">
                    <div class="blog__image">
                        <a href="<?php echo BASE_URL ?>/entrada-2" class="blog__image--link">
                            <picture>
                                <source srcset="assets/img/blog/protector-bucal-boxeo.webp" type="image/webp">
                                <source srcset="assets/img/blog/protector-bucal-boxeo.jpg" type="image/jpeg">
                                <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/protector-bucal-boxeo.jpg" alt="Protector bucal de boxeo">
                            </picture>
                        </a>
                    </div>
                    <div class="blog__content">
                        <a href="<?php echo BASE_URL ?>/entrada-2">
                            <h3 class="blog__title">
                                Cómo adaptar el protector bucal a tu boca
                            </h3>
                        </a>
                        <p class="blog__author">
                            Escrito el: <span>30/12/2024</span> por: <span>Admin</span>
                        </p>
                        <p class="blog__description">
                            El protector bucal es un accesorio fundamental en el mundo del boxeo, este accesorio protege tus dientes y...
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