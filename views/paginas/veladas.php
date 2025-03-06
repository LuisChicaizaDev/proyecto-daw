<?php 
    //Head
    $currentPage = 'veladas';
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
        <h1 class="text-center">Todas las Veladas <br> de Boxeo</h1>
        
        <!--Container Veladas-->
        <section class="veladas my-container my-paddings">
    
            <?php 
                // Se incluyen las veladas
                include 'listados.php';
            ?>
            
        </section><!--/Container Veladas-->

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