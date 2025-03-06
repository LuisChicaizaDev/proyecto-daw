<?php 
    // Si no está definida la sesión se inicia 
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false; // Si no está autenticado será false
?>
<div class="nav-mobile">
    <button type="button" class="nav-mobile__close" aria-label="Cerrar menú">
        <svg  xmlns="http://www.w3.org/2000/svg" class="close__icon"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  
            stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" />
        </svg>
    </button>
    <!--Header Nav-->
    <div class="nav-mobile__content d-flex flex-column gap-5">
        <a href="<?php echo BASE_URL;?>/" class="logo__header">
            <img  width="143" height="65"
            src="<?php echo BASE_URL;?>/static/logo/logo-white.svg" 
            class="logo__image" alt="Logotipo Boxeo Project" >
        </a>
        
        <!--Nav-->
        <div class="nav-mobile__pages">
            <ul class="nav__list d-flex flex-column gap-5">
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/" class="nav__link <?php echo ($currentPage === 'inicio' ? 'nav__link--active' : '') ?>">Inicio</a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/veladas" class="nav__link <?php echo ($currentPage === 'veladas' ? 'nav__link--active' : '') ?>">Veladas</a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/blog" class="nav__link <?php echo ($currentPage === 'blog' ? 'nav__link--active' : '') ?>">Blog</a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo BASE_URL;?>/contacto" class="nav__link <?php echo ($currentPage === 'contacto' ? 'nav__link--active' : '') ?>">Contacto</a>
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
        <div class="nav-mobile__buttons d-flex gap-4 align-items-center mt-4">
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
        </div>
    </div><!--/Header Nav-->
</div>
<div class="overlay"></div> 