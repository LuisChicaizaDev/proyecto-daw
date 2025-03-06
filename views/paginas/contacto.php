<?php 
    //Head
    $currentPage = 'contacto';
    includeTemplate('head', $currentPage);
?>

<body>

    <!--Header-->
    <header class="header my-paddings contact-bg">
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
                    Contacta con <br> Nosotros
                </h1>
            </div>
        </div><!--/Header content-->

        <!--Nav Mobile-->
        <?php 
            includeTemplate('nav-mobile', $currentPage);
        ?>
        <!--/Nav Mobile-->

    </header> <!--/Header-->

    <!--Main-->
    <main class="main interna">
        
        <section class="contacto my-container my-paddings">
            <h2 class="contacto__title">Rellena el siguiente formulario para ponerte <br>
                en contacto con nosotros
            </h2>


            <!--Formulario-->
            <form class="formulario contacto-form"  method="POST" action="<?php echo BASE_URL;?>/contacto">

                <!--Alert de exito-->
                <?php if (!empty($mensaje_exito)) : ?>
                        <div class="formulario-alert contacto-form__alert alert alert-success" role="alert">
                            <?php echo $mensaje_exito; ?>
                    </div>
                <?php endif; ?>

                <!-- Alerts errores -->
                <?php foreach($errores as $error): ?>
                    <div class="formulario-alert contacto-form__alert alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach;?>

                <!-- Alerts errores Front-end-->
                <div class="formulario-alert contacto-form__alert alert alert-danger hidden" role="alert">
                </div>

                <div class="formulario-group contacto-form__group--nombre">
                    <label for="nombre">
                        Introduce tu nombre <span class="required"> *</span> 
                    </label>
                    <input 
                    type="text" 
                    id="nombre" 
                    name="contacto[nombre]" 
                    placeholder="Ej. Pepito" 
                    value="<?php echo $nombre; ?>"
                    >
                </div>
                <div class="formulario-group contacto-form__group--email">
                    <label for="email">
                        Introduce tu correo electrónico <span class="required"> *</span>
                    </label>
                    <input 
                    type="email" 
                    id="email" 
                    name="contacto[email]" 
                    placeholder="Ej. pepito@gmail.com" 
                    value="<?php echo $email; ?>"
                    >
                </div>
                <div class="formulario-group contacto-form__group--telefono">
                    <label for="telefono">
                        Introduce tu número de teléfono <span class="required"> *</span>
                    </label>
                    <input 
                    type="tel" 
                    id="telefono" 
                    name="contacto[telefono]" 
                    placeholder="Ej. 654123654" 
                    value="<?php echo $telefono; ?>"
                    >
                </div>
                <div class="formulario-group contacto-form__group--mensaje">
                    <label for="mensaje">
                        Déjanos un Mensaje <span class="required"> *</span>
                    </label>
                    <textarea 
                    id="mensaje" 
                    name="contacto[mensaje]" 
                    rows="4" 
                    cols="50" 
                    placeholder="Escríbenos si tienes alguna duda"
                    ><?php echo htmlspecialchars($mensaje); ?></textarea>
                </div>
                <div class="formulario-group contacto-form__group--politicas">
                    <input 
                    type="checkbox" 
                    id="politica" 
                    name="contacto[politica]" 
                    value="aceptado" 
                    required>
                    <label for="politica">
                        Acepto la <a href="javascript:void(0);alert('Próximamente...')">Política de Privacidad</a><span class="required"> *</span>
                    </label>
                </div>
                
                <input type="submit" class="formulario-submit contacto-form__submit btn-gold-block" value="Contactar">

            </form><!--/Formulario-->
            
        </section>

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>