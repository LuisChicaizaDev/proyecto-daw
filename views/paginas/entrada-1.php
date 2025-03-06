<?php 
    //Head
    $currentPage = 'Descubre cómo elegir los guantes perfectos';
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
            <h1>Descubre cómo elegir los guantes perfectos</h1>

            <div class="entrada__content">
                <p class="blog__author mb-5">
                    Escrito el: <span>07/12/2024</span> por: <span>Admin</span>
                </p>
                <div class="entrada__image">
                    <picture>
                        <source srcset="assets/img/blog/guantes-boxeo.webp" type="image/webp">
                        <source srcset="assets/img/blog/guantes-boxeo.jpg" type="image/jpeg">
                        <img width="640" height="550" loading="lazy" class="img-fluid" src="assets/img/blog/guantes-boxeo.jpg" alt="Guantes de boxeo">
                    </picture>
                </div>


                <div class="entrada__description">
                    <p class="my-4">
                        Los guantes de boxeo no son simplemente un complemento necesario para practicar dicho deporte, es fundamental tanto para proteger tus manos y tu integridad como para garantizar 
                        también la seguridad de nuestro oponente. Elegir los guantes adecuados es muy importante. En este artículo te cuento por qué es tan importantes elegir bien y qué factores debes 
                        tener en cuenta antes de comprarlos. 
                    </p>
                    
                </div>

                <h2 class="my-5">1. Protege tus manos y muñecas</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        Con cada golpe que lanzas provocas una intensa presión sobre tus nudillos y muñecas. Si lo guantes no tienen el suficiente acolchado o no son de tu talla, corres el riesgo de sufrir 
                        alguna fractura o esguince. Por lo tanto, es importante que los pruebes antes de comprarlos y así asegurarte que te proporcionan un soporte adecuado a tu mano y muñeca.
                    </p>
                </div>

                <h2 class="my-5">2. Adaptar el peso a tu nivel y objetivo</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        Los guantes de boxeo tienen diferentes pesos, normalmente se miden en onzas (oz). Por ejemplo:
                    </p>
                    <ul>
                        <li class="my-4">
                            <strong>10-12 oz</strong>: Estos guantes son ideales para competiciones o para sesiones de sparring.
                        </li>
                        <li class="my-4">
                            <strong>14-16 oz</strong>: Son perfectos para entrenamientos intensos y se suelen utilizar en sesiones de 
                            sparring para no lastimar demasiado al oponente y para sentir las manos menos pesadas en una competición, puesto que los guantes que se usan pesan menos.
                        </li>
                    </ul>
                </div>

                <h2 class="my-5">3. Material: Piel o sintético</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        Los guantes de 100% piel son mucho más duraderos en el tiempo pero generalmente son más caros. Sin embargo, los guantes sintéticos son más económicos 
                        y son totalmente válidos para practicar este deporte. Todo depende también de tu presupuesto y el uso que pretendes darles.
                    </p>
                </div>

                <h2 class="my-5">4. Su cierre es importante</h2>

                <div class="entrada__description">
                    <p class="my-4">
                        En este aspecto existen principalmente dos tipos:
                    </p>

                    <ul>
                        <li class="my-4">
                            <strong>Velcro</strong>: Son mucho más prácticos para entrenamientos diarios, ya que puedes ponértelos y quitártelos sin mayor problema.
                        </li>
                        <li class="my-4">
                            <strong>Cuerda</strong>: Este cierre se utiliza principalmente en combates profesionales, ya que tienen un ajuste mucho más firme pero para ponértelos y quitártelos necesitarás ayuda.
                        </li>
                    </ul>

                    <p class="my-4">
                        Como puedes ver elegir los guantes correctos no solo afecta al rendimiento deportivo, sino también a nuestra seguridad. Puedes ir probando diferentes modelos y pesos. 
                        Unos buenos guantes son una buena inversión como boxeador y normalmente para iniciar en este deporte suelen ser de 10-12 oz.
                    </p>
                </div>

            </div>
        </section>

        <!--Blog-->
        <section class="blog my-container my-paddings">
            <h2 class="text-center">Nuestro Blog</h2>

            <!--Container blog-->
            <div class="container__blog">

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