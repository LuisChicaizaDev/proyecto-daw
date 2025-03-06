<?php 
    // Si no está definida la sesión se inicia 
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false; // Si no está autenticado será false
    //debuguear($auth);
?>

<div class="header__nav d-flex justify-content-between align-items-center">
    <a href="<?php echo BASE_URL;?>/" class="logo__header">
        <img  width="143" height="65"
        src="<?php echo BASE_URL;?>/static/logo/logo-white.svg" 
        class="logo__image" alt="Logotipo Boxeo Project" >
    </a>
    
    <!--Nav-->
    <nav class="nav d-flex align-items-center gap-5">
        <div class="nav__pages">
            <ul class="nav__list d-flex gap-5">
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/" class="nav__link <?php echo ($currentPage === 'inicio') ? 'nav__link--active' : ''?>">Inicio</a>
                </li>
                <li class="nav__item">  
                    <a href="<?php echo BASE_URL;?>/veladas" class="nav__link <?php echo ($currentPage === 'veladas') ? 'nav__link--active' : ''?>">Veladas</a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/blog" class="nav__link <?php echo ($currentPage === 'blog') ? 'nav__link--active' : ''?>">Blog</a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/contacto" class="nav__link <?php echo ($currentPage === 'contacto') ? 'nav__link--active' : ''?>">Contacto</a>
                </li>

                <?php if($auth) : ?>
                    <li class="nav__item">
                        <a href="<?php echo BASE_URL;?>/admin" class="nav__link <?php echo ($currentPage === 'administrador') ? 'nav__link--active' : ''?>">
                            Mi Panel
                        </a>
                    </li>
                <?php endif; ?>
                
            </ul>
        </div>
        <div class="nav__buttons d-flex gap-2 align-items-center">
            <!--login-->

            <?php if($auth) : ?>
                <a href="<?php echo BASE_URL;?>/logout" class="button__login" aria-label="Cerrar Sesión">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                        <path d="M15 12h-12l3 -3" /><path d="M6 15l-3 -3" />
                    </svg>
                    <span>
                        Salir
                    </span>
                </a>
                <?php else: ?>
                <a href="<?php echo BASE_URL;?>/login" class="button__login" aria-label="Iniciar Sesión">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M9 0C10.1935 0 11.3381 0.474106 12.182 1.31802C13.0259 2.16193 13.5 3.30653 13.5 4.5C13.5 5.69347 13.0259 6.83807 12.182 7.68198C11.3381 8.52589 10.1935 9 9 9C7.80653 9 6.66193 8.52589 5.81802 7.68198C4.97411 6.83807 4.5 5.69347 4.5 4.5C4.5 3.30653 4.97411 2.16193 5.81802 1.31802C6.66193 0.474106 7.80653 0 9 0ZM9 11.25C13.9725 11.25 18 13.2638 18 15.75V18H0V15.75C0 13.2638 4.0275 11.25 9 11.25Z" fill="currentColor"/>
                    </svg>
                    <span>
                        Acceder
                    </span>
                </a>
            <?php endif; ?>
            
            <!--menu hamburguesa-->
            <button type="button" class="button__hamburger" aria-label="Abrir menú">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3424 29.6576C4.688 32 8.4576 32 16 32C23.5424 32 27.3136 32 29.656 29.656C32 27.3152 32 23.5424 32 16C32 8.4576 32 4.6864 29.656 2.3424C27.3152 0 23.5424 0 16 0C8.4576 0 4.6864 0 2.3424 2.3424C0 4.688 0 8.4576 0 16C0 23.5424 0 27.3152 2.3424 29.6576ZM26.8 22.4C26.8 22.7183 26.6736 23.0235 26.4485 23.2485C26.2235 23.4736 25.9183 23.6 25.6 23.6H6.4C6.08174 23.6 5.77652 23.4736 5.55147 23.2485C5.32643 23.0235 5.2 22.7183 5.2 22.4C5.2 22.0817 5.32643 21.7765 5.55147 21.5515C5.77652 21.3264 6.08174 21.2 6.4 21.2H25.6C25.9183 21.2 26.2235 21.3264 26.4485 21.5515C26.6736 21.7765 26.8 22.0817 26.8 22.4ZM25.6 17.2C25.9183 17.2 26.2235 17.0736 26.4485 16.8485C26.6736 16.6235 26.8 16.3183 26.8 16C26.8 15.6817 26.6736 15.3765 26.4485 15.1515C26.2235 14.9264 25.9183 14.8 25.6 14.8H6.4C6.08174 14.8 5.77652 14.9264 5.55147 15.1515C5.32643 15.3765 5.2 15.6817 5.2 16C5.2 16.3183 5.32643 16.6235 5.55147 16.8485C5.77652 17.0736 6.08174 17.2 6.4 17.2H25.6ZM26.8 9.6C26.8 9.91826 26.6736 10.2235 26.4485 10.4485C26.2235 10.6736 25.9183 10.8 25.6 10.8H6.4C6.08174 10.8 5.77652 10.6736 5.55147 10.4485C5.32643 10.2235 5.2 9.91826 5.2 9.6C5.2 9.28174 5.32643 8.97652 5.55147 8.75147C5.77652 8.52643 6.08174 8.4 6.4 8.4H25.6C25.9183 8.4 26.2235 8.52643 26.4485 8.75147C26.6736 8.97652 26.8 9.28174 26.8 9.6Z" fill="currentColor"/>
                </svg>
                <span>
                    Menú
                </span>
            </button>
        </div>
    </nav><!--/Nav-->
</div>