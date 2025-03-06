<?php 
    //Head
    $currentPage = 'blog';
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
        <h1 class="text-center">Nuestro Blog</h1>

        <!--Container blog-->
        <div class="container__blog my-container my-paddings">

            <!--Card Blog 1-->
            <article class="blog__card">
                    <div class="blog__image">
                        <a href="<?php echo BASE_URL ?>/entrada-1" class="blog__image--link">
                            <picture>
                                <source srcset="assets/img/blog/guantes-boxeo.webp" type="image/webp">
                                <source srcset="assets/img/blog/guantes-boxeo.jpg" type="image/jpeg">
                                <img loading="lazy" src="assets/img/blog/guantes-boxeo.jpg" alt="Guantes de boxeo">
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

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>