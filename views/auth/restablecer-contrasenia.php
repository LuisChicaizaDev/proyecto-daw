<?php 
    //Head
    $currentPage = 'Restablecer contraseña';
    includeTemplate('head', $currentPage);
?>

<body>

    <!--Header-->
    <header class="header my-paddings ">

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
        
        <section class="login my-container my-paddings">
            <h1 class="login__title text-center">Restablecer Contraseña
            </h1>
            
            <p class="text-center">
                Para restablecer tu contraseña, introduce el correo electrónico que usaste para registrarte e ingresa tu nueva contraseña.
            </p>

            <!--Restablecer Formulario-->
            <form  class="formulario restablecer-form" method="POST" action="<?php echo BASE_URL;?>/restablecer-contrasenia">

                <!--Alert de exito-->
                <?php if(isset($_SESSION['mensaje_exito'])) : ?>
                    <div class="formulario-alert restablecer-form alert alert-success" role="alert">
                        <?php echo $_SESSION['mensaje_exito']; ?>
                    </div>
                    <?php unset($_SESSION['mensaje_exito']); // Limpiamos el mensaje de sesion ?>
                <?php endif; ?>

                <!-- Alerts errores -->
                <?php foreach($errores as $error): ?>
                    <div class="formulario-alert restablecer-form__alert alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach;?>

                <!-- Alerts errores Front-end-->
                <div class="formulario-alert restablecer-form__alert alert alert-danger hidden" role="alert">
                </div>

                <div class="formulario-group contacto-form__group--email">
                    <label for="email">
                        Correo electrónico <span class="required"> *</span>
                    </label>
                    <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Ej. pepito@gmail.com" 
                    value="<?php echo $email; ?>">
                </div>

                <div class="formulario-group restablecer-form__group--contrasenia">
                    <label for="contrasenia">
                        Nueva contraseña <span class="required"> *</span>
                    </label>
                    <input 
                    type="password" 
                    id="contrasenia" 
                    name="contrasenia" 
                    value="<?php echo $contrasenia; ?>">
                    <!-- Mostrar / ocultar contraseña-->
                    <button type="button" class="contrasenia__button" aria-label="Cambiar modo claro">
                        <span class="contrasenia__icon-eye contrasenia__icon-eye--on hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M14.0002 5.83334C18.2923 5.83334 23.5225 8.65318 25.3518 12.7178C25.5222 13.1005 25.6668 13.5462 25.6668 14C25.6668 14.4527 25.5233 14.8995 25.3518 15.2822C23.5213 19.3468 18.2912 22.1667 14.0002 22.1667C9.70916 22.1667 4.47783 19.3468 2.6485 15.2822C2.47816 14.8983 2.3335 14.4538 2.3335 14C2.3335 13.5473 2.477 13.1005 2.6485 12.7178C4.479 8.65318 9.70916 5.83334 14.0002 5.83334ZM14.0002 9.33334C12.7625 9.33334 11.5755 9.82501 10.7003 10.7002C9.82516 11.5753 9.3335 12.7623 9.3335 14C9.3335 15.2377 9.82516 16.4247 10.7003 17.2998C11.5755 18.175 12.7625 18.6667 14.0002 18.6667C15.2378 18.6667 16.4248 18.175 17.3 17.2998C18.1752 16.4247 18.6668 15.2377 18.6668 14C18.6668 12.7623 18.1752 11.5753 17.3 10.7002C16.4248 9.82501 15.2378 9.33334 14.0002 9.33334ZM14.0002 11.6667C14.619 11.6667 15.2125 11.9125 15.6501 12.3501C16.0877 12.7877 16.3335 13.3812 16.3335 14C16.3335 14.6188 16.0877 15.2123 15.6501 15.6499C15.2125 16.0875 14.619 16.3333 14.0002 16.3333C13.3813 16.3333 12.7878 16.0875 12.3502 15.6499C11.9127 15.2123 11.6668 14.6188 11.6668 14C11.6668 13.3812 11.9127 12.7877 12.3502 12.3501C12.7878 11.9125 13.3813 11.6667 14.0002 11.6667Z" 
                                fill="currentColor"/>
                            </svg>
                        </span>
                        <span class="contrasenia__icon-eye contrasenia__icon-eye--off">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M13.8015 10.5L17.4998 14.1867V14C17.4998 13.0717 17.1311 12.1815 16.4747 11.5251C15.8183 10.8687 14.9281 10.5 13.9998 10.5H13.8015ZM8.78484 11.4333L10.5932 13.2417C10.5348 13.4867 10.4998 13.7317 10.4998 14C10.4998 14.9283 10.8686 15.8185 11.525 16.4749C12.1813 17.1313 13.0716 17.5 13.9998 17.5C14.2565 17.5 14.5132 17.465 14.7582 17.4067L16.5665 19.215C15.7848 19.6 14.9215 19.8333 13.9998 19.8333C12.4527 19.8333 10.969 19.2188 9.87505 18.1248C8.78109 17.0308 8.1665 15.5471 8.1665 14C8.1665 13.0783 8.39984 12.215 8.78484 11.4333ZM2.33317 4.98167L4.99317 7.64167L5.51817 8.16667C3.59317 9.68333 2.0765 11.6667 1.1665 14C3.18484 19.1217 8.1665 22.75 13.9998 22.75C15.8082 22.75 17.5348 22.4 19.1098 21.77L19.6115 22.26L23.0182 25.6667L24.4998 24.185L3.81484 3.5M13.9998 8.16667C15.5469 8.16667 17.0307 8.78125 18.1246 9.87521C19.2186 10.9692 19.8332 12.4529 19.8332 14C19.8332 14.7467 19.6815 15.47 19.4132 16.1233L22.8315 19.5417C24.5815 18.0833 25.9815 16.17 26.8332 14C24.8148 8.87833 19.8332 5.25 13.9998 5.25C12.3665 5.25 10.8032 5.54167 9.33317 6.06667L11.8648 8.575C12.5298 8.31833 13.2415 8.16667 13.9998 8.16667Z" 
                                fill="currentColor"/>
                            </svg>
                        </span>
                    </button>   
                </div>
                <div class="formulario-group restablecer-form__group--contrasenia-confirm">
                    <label for="comfirm_contrasenia">
                        Vuelve a introducir la contraseña <span class="required"> *</span>
                    </label>
                    <input 
                    type="password" 
                    id="comfirm_contrasenia" 
                    name="comfirm_contrasenia" 
                    value="<?php echo $confirm_contrasenia; ?>">
                    <!-- Mostrar / ocultar contraseña-->
                    <button type="button" class="contrasenia__button" aria-label="Mostrar/ocultar la contraseña">
                        <span class="contrasenia__icon-eye contrasenia__icon-eye--on hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M14.0002 5.83334C18.2923 5.83334 23.5225 8.65318 25.3518 12.7178C25.5222 13.1005 25.6668 13.5462 25.6668 14C25.6668 14.4527 25.5233 14.8995 25.3518 15.2822C23.5213 19.3468 18.2912 22.1667 14.0002 22.1667C9.70916 22.1667 4.47783 19.3468 2.6485 15.2822C2.47816 14.8983 2.3335 14.4538 2.3335 14C2.3335 13.5473 2.477 13.1005 2.6485 12.7178C4.479 8.65318 9.70916 5.83334 14.0002 5.83334ZM14.0002 9.33334C12.7625 9.33334 11.5755 9.82501 10.7003 10.7002C9.82516 11.5753 9.3335 12.7623 9.3335 14C9.3335 15.2377 9.82516 16.4247 10.7003 17.2998C11.5755 18.175 12.7625 18.6667 14.0002 18.6667C15.2378 18.6667 16.4248 18.175 17.3 17.2998C18.1752 16.4247 18.6668 15.2377 18.6668 14C18.6668 12.7623 18.1752 11.5753 17.3 10.7002C16.4248 9.82501 15.2378 9.33334 14.0002 9.33334ZM14.0002 11.6667C14.619 11.6667 15.2125 11.9125 15.6501 12.3501C16.0877 12.7877 16.3335 13.3812 16.3335 14C16.3335 14.6188 16.0877 15.2123 15.6501 15.6499C15.2125 16.0875 14.619 16.3333 14.0002 16.3333C13.3813 16.3333 12.7878 16.0875 12.3502 15.6499C11.9127 15.2123 11.6668 14.6188 11.6668 14C11.6668 13.3812 11.9127 12.7877 12.3502 12.3501C12.7878 11.9125 13.3813 11.6667 14.0002 11.6667Z" 
                                fill="currentColor"/>
                            </svg>
                        </span>
                        <span class="contrasenia__icon-eye contrasenia__icon-eye--off">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M13.8015 10.5L17.4998 14.1867V14C17.4998 13.0717 17.1311 12.1815 16.4747 11.5251C15.8183 10.8687 14.9281 10.5 13.9998 10.5H13.8015ZM8.78484 11.4333L10.5932 13.2417C10.5348 13.4867 10.4998 13.7317 10.4998 14C10.4998 14.9283 10.8686 15.8185 11.525 16.4749C12.1813 17.1313 13.0716 17.5 13.9998 17.5C14.2565 17.5 14.5132 17.465 14.7582 17.4067L16.5665 19.215C15.7848 19.6 14.9215 19.8333 13.9998 19.8333C12.4527 19.8333 10.969 19.2188 9.87505 18.1248C8.78109 17.0308 8.1665 15.5471 8.1665 14C8.1665 13.0783 8.39984 12.215 8.78484 11.4333ZM2.33317 4.98167L4.99317 7.64167L5.51817 8.16667C3.59317 9.68333 2.0765 11.6667 1.1665 14C3.18484 19.1217 8.1665 22.75 13.9998 22.75C15.8082 22.75 17.5348 22.4 19.1098 21.77L19.6115 22.26L23.0182 25.6667L24.4998 24.185L3.81484 3.5M13.9998 8.16667C15.5469 8.16667 17.0307 8.78125 18.1246 9.87521C19.2186 10.9692 19.8332 12.4529 19.8332 14C19.8332 14.7467 19.6815 15.47 19.4132 16.1233L22.8315 19.5417C24.5815 18.0833 25.9815 16.17 26.8332 14C24.8148 8.87833 19.8332 5.25 13.9998 5.25C12.3665 5.25 10.8032 5.54167 9.33317 6.06667L11.8648 8.575C12.5298 8.31833 13.2415 8.16667 13.9998 8.16667Z" 
                                fill="currentColor"/>
                            </svg>
                        </span>
                    </button>   
                </div>

                <div class="formulario-group">
                    <a href="<?php echo BASE_URL . '/login'; ?>" class="iniciar-sesion">Volver a iniciar sesión</a>
                </div>
                
                <input type="submit" class="formulario-submit restablecer-form__submit btn-gold-block" value="Actualizar contraseña">

            </form>
            
        </section>

    </main><!--/Main-->

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
?>