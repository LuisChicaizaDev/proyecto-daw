    <!--Footer-->
    <footer class="footer my-paddings">
        
        <div class="my-container footer__content">
            <a href="<?php echo BASE_URL;?>" class="logo__footer">
                <img  width="143" height="65"
                src="<?php echo BASE_URL;?>/static/logo/logo-white.svg" 
                class="logo__image" alt="Logotipo Boxeo Project" >
            </a>
            <div class="footer__links">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="javascript:void(0);alert('Próximamente...')"  rel="nofollow" class="nav__link">Aviso Legal</a>
                    </li>
                    <li class="nav__item">
                        <a href="javascript:void(0);alert('Próximamente...')"  rel="nofollow" class="nav__link">Política de Privacidad</a>
                    </li>
                    <li class="nav__item">
                        <a href="javascript:void(0);alert('Próximamente...')"  rel="nofollow" class="nav__link">Política de Cookies</a>
                    </li>                    
                </ul>
            </div>
        </div>

        <span class="footer__line"></span>

        <p class="footer__copyright text-center">
            <?php 
                $year_copy = date('Y');
                echo '&copy; ' . $year_copy . '. Diseñado y Desarrollado por' 
            ?>
            <br>
            
            <a href="https://luischicaizadev.github.io/" target="_blank">Luis Chicaiza</a>
        </p>
        
    </footer><!--/Footer-->

    <!--Light Mode-->
    <button type="button" class="light-mode__button" aria-label="Cambiar modo claro">
        <img loading="lazy" width="24" height="24" class="light-mode__img--dark hidden"
            src="<?php echo BASE_URL;?>/static/icon-bombilla-off.svg" alt="Icono bombilla apagada para el modo oscuro">
        <img loading="lazy" width="24" height="24" class="light-mode__img--light"
            src="<?php echo BASE_URL;?>/static/icon-bombilla-on.svg" alt="Icono bombilla encendida para el modo claro">
    </button>

    <!--Scroll back to Top-->
    <button type="button" class="to-top__button" aria-label="Volver arriba">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-up">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 5l0 14" />
            <path d="M18 11l-6 -6" />
            <path d="M6 11l6 -6" />
        </svg>
    </button>
  
    
    <!--Permoformance webp-->
    <script src="<?php echo BASE_URL;?>/assets/js/bundle.min.js"></script>
    <!--JS Libraries-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>