<?php 
    //Head
    $currentPage = '¿Por qué deberías usar botas de boxeo? Entérate de sus ventajas';
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
            <h1>¿Por qué deberías usar botas de boxeo? Entérate de sus ventajas</h1>

            <div class="entrada__content">
                <p class="blog__author mb-5">
                    Escrito el: <span>30/12/2024</span> por: <span>Admin</span>
                </p>
                <div class="entrada__image">
                    <picture>
                        <source srcset="assets/img/blog/botas-boxeo.webp" type="image/webp">
                        <source srcset="assets/img/blog/botas-boxeo.jpg" type="image/jpeg">
                        <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/botas-boxeo.jpg" alt="Boxeadores con botas de boxeo">
                    </picture>
                </div>


                <div class="entrada__description">
                    <p class="my-4">
                        Normalmente cuando se habla del equipamiento necesario para practicar boxeo, se suele pensar principalmente en los guantes y vendas, pero las botas de boxeo también son importantes. Las botas están diseñadas específicamente para lograr tener un mejor rendimiento y también protegernos en el ring.
                    </p>
                    <p class="my-4">
                        Aquí te doy 3 razones por las cuales deberías considerar utilizar botas de boxeo.
                    </p>
                </div>

                <h2 class="my-5">1. Tendrás una mayor comodidad y buen soporte</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        Las botas de boxeo cuentan con una suela plana y antideslizante que nos ayudan a mantener mejor el equilibrio y evitar que resbalemos mientras nos desplazamos por el ring. Además, tiene un mejor soporte en la zona de los tobillos, lo cual reduce el riesgo de lesiones que puede ocurrir mientras realizamos movimientos rápidos o en cambios de dirección.
                    </p>
                </div>

                <h2 class="my-5">2. Sentirás comodidad en los movimientos</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        Están diseñadas para ser ligeras y flexibles, esto nos facilita para tener un mejor juego de pies. Es una ventaja en el boxeo ya que al tener una mejor movilidad y juego de piernas puede jugar a nuestro favor en un combate o entrenamiento.
                    </p>
                </div>

                <h2 class="my-5">3. Diseñadas especialmente para el ring</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        A diferencia de cualquier zapatilla deportiva, estas botas están fabricadas únicamente para el tipo de superficie que tiene un ring, proporcionándonos el agarre necesario para evitar resbalones y caídas en el ring, sin comprometer tu velocidad en los movimientos.
                    </p>
                    <p class="my-4">
                        Invertir en unas botas de boxeo adecuadas es una buena decisión, ya que no solo puedes reducir el riesgo de lesiones sino también puedes mejor tu rendimiento utilizando un calzado adecuado para este deporte.
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

            </div><!--/Container blog-->

            <div class="more__blogs d-flex justify-content-center">
                <a href="<?php echo BASE_URL ?>/blog" class="btn-gold">Ver todo</a>
            </div>

        </section><!--/Blog-->

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>