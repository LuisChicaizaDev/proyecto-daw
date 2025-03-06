'use strict';
document.addEventListener('DOMContentLoaded', function(){
    iniciarFunctions();
});

function iniciarFunctions(){
    navMobile();
    showPassword();
    changeTabs();
    scrollToTop();
    darkMode();
    alertForm();
    validarFecha();
    validarRegistro();
    validarAcceder();
    validarContacto();
    validarRestablecer();
    inputFile();
}

function navMobile(){
    const hamburger = document.querySelector('.nav__buttons .button__hamburger');
    const close = document.querySelector('.nav-mobile .nav-mobile__close');
    const overlay = document.querySelector('.header .overlay');
    const nav = document.querySelector('.header .nav-mobile');
    const body = document.querySelector('body');

    //open nav
    hamburger.addEventListener('click', () => {
        nav.classList.toggle('show-nav-mobile');
        overlay.classList.toggle('overlay-active');
        body.classList.toggle('block-body');
    });

    //close nav
    close.addEventListener('click', () => {
        nav.classList.remove('show-nav-mobile');
        overlay.classList.remove('overlay-active');
        body.classList.remove('block-body');
    });

    overlay.addEventListener('click', (e) =>{
        if(e.target === overlay){
            nav.classList.remove('show-nav-mobile');
            overlay.classList.remove('overlay-active');
            body.classList.remove('block-body');
        }
    });
}

function scrollToTop(){
    const btn = document.querySelector('.to-top__button');

    window.addEventListener('scroll' , () =>{
        if(window.scrollY > 300){
            btn.classList.add('show-button');
        }else{
            btn.classList.remove('show-button');
        }
    });

    btn.addEventListener('click', () =>{
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

}

function darkMode(){
    const lightModeBtn = document.querySelector('.light-mode__button');
    const imgDark = document.querySelector('.light-mode__img--dark');
    const imgLight = document.querySelector('.light-mode__img--light');

    // Preferencias del sistema
    const prefersLightMode = window.matchMedia('(prefers-color-scheme: light)');
    
    // Función para actualizar el modo y los iconos según el modo actual
    function updateMode(isLightMode) {
        if (isLightMode) {
            document.body.classList.add('light-mode');
            imgDark.classList.add('hidden');
            imgLight.classList.remove('hidden');
            localStorage.setItem('colorMode', 'light');
        } else {
            document.body.classList.remove('light-mode');
            imgDark.classList.remove('hidden');
            imgLight.classList.add('hidden');
            localStorage.setItem('colorMode', 'dark');
        }
    }

    // Verificar la preferencia guardada del usuario en localStorage
    const savedColorMode = localStorage.getItem('colorMode');
    
    if (savedColorMode) {
        // Usar el modo guardado en localStorage
        updateMode(savedColorMode === 'light');
    } else {
        // Si no hay preferencia guardada, usar la preferencia del sistema
        updateMode(prefersLightMode.matches);
    }

    // Actualizar el modo si las preferencias del sistema cambian y no hay una preferencia guardada
    prefersLightMode.addEventListener('change', (e) => {
        if (!localStorage.getItem('colorMode')) {
            updateMode(e.matches);
        }
    });

    // Cambiar modo claro/oscuro cuando el usuario haga clic en el botón
    lightModeBtn.addEventListener('click', () => {
        const isLightMode = !document.body.classList.contains('light-mode');
        updateMode(isLightMode);
    });
}

function showPassword(){
    const inputsPassword = document.querySelectorAll('.login INPUT[type="password"]');
    
    // Iteramos sobre los inputs de tipo password
    inputsPassword.forEach((input) => {
        const iconButton = input.parentElement.querySelector('.contrasenia__button'); //  Para cceder al nodo padre directo
        const iconEyeOn = iconButton.querySelector('.contrasenia__icon-eye--on');
        const iconEyeOff = iconButton.querySelector('.contrasenia__icon-eye--off');

        iconButton.addEventListener('click', () => {

            if(input.type === 'password'){
                iconEyeOn.classList.toggle('hidden');
                iconEyeOff.classList.toggle('hidden');
                input.type = 'text';
            }else{
                iconEyeOn.classList.toggle('hidden');
                iconEyeOff.classList.toggle('hidden');
                input.type = 'password';
            }
        
        });
    });
    
}

function changeTabs(){
    const tabs = document.querySelectorAll('.nav-tabs__item .nav-link');
    const sections = document.querySelectorAll('.tab-section');

    
    if (tabs.length === 0 || sections.length === 0) {
        return; 
    }

    // oculta las secciones y muestra solo el seleccionado
    function showTab(tabId){
        sections.forEach((section) => section.classList.add('hidden'));
        document.querySelector(tabId).classList.remove('hidden');
    }

    // Muestra la seccion inicial
    showTab(tabs[0].getAttribute('href'));
    tabs[0].classList.add('active');
   
    tabs.forEach((tab)=>{

        tab.addEventListener('click', (e)=>{
            e.preventDefault();

            tabs.forEach((t) => t.classList.remove('active'));
            tab.classList.add('active');    

            const sectionId = tab.getAttribute('href');
            showTab(sectionId);
        });
    });
}

function alertForm(){
    const formEliminar = document.querySelectorAll('.form-eliminar');
    
    formEliminar.forEach((form) =>{
       
        form.addEventListener('submit', (e) =>{
            e.preventDefault();

             // Input con name="tipo" dentro del formulario
             const tipoInput = form.querySelector('input[name="tipo"]');
             const tipo = tipoInput ? tipoInput.value : '';
 
             // Mensaje 
             let mensaje = '⚠️ ¿Estás seguro que quieres eliminar este elemento? \n Se eliminará definitivamente.';
             if (tipo === 'boxeador') {
                 mensaje = '⚠️ ¿Estás seguro que quieres eliminar este boxeador? \n Se eliminará definitivamente.';
             } else if (tipo === 'velada') {
                 mensaje = '⚠️ ¿Estás seguro que quieres eliminar esta velada? \n Se eliminará definitivamente.';
             }

            // Este método muestra un cuadro de confirmación para confirmar la eliminación
            const confirmEliminar = confirm(mensaje);
    
            if(confirmEliminar){
                form.submit(); 
            }
        });
    });
    

}

function validarFecha(){
    const fechaInput = document.getElementById('fecha');
    // Si no existe, no ejecuta el resto de la función
    if (!fechaInput) return; 

    const hoy = new Date();
    const anio = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0'); // Mes en formato 2 dígitos
    const dia = String(hoy.getDate()).padStart(2, '0'); // Día en formato 2 dígitos
    const fechaActual = `${anio}-${mes}-${dia}`;

    // atributo min para evitar fechas anteriores
    fechaInput.min = fechaActual;

}

function validarRegistro(){
    const formRegistro = document.querySelector('.registrarse-form');
    if (!formRegistro) return; 
    const nombre = formRegistro.querySelector('#nombre');
    const email = formRegistro.querySelector('#email');
    const contrasenia = formRegistro.querySelector('#contrasenia');
    const confirmContrasenia = formRegistro.querySelector('#comfirm_contrasenia');
    const alert = formRegistro.querySelector('.registrarse-form__alert');


    formRegistro.addEventListener('submit', (e) =>{
        e.preventDefault();

       // Array para los errores
        let errores = [];
        
        if(!nombre.value.trim()){
            errores.push('El nombre es obligatorio.');
            
        }
        if(!email.value.trim()){
            errores.push('El correo es obligatorio.');
        }
        if(!contrasenia.value.trim()){
            errores.push('La contraseña es obligatoria.');
        }
        if(contrasenia.value && !confirmContrasenia.value.trim()){
            errores.push('Confirma la contraseña.');
        }

        // validar nombre
        const regexNombre = /^[A-Za-zÁÉÍÓÚÜáéíóúü]+(?: [A-Za-zÁÉÍÓÚÜáéíóúü]+)*$/; // Permite más de un nombre y letras de la A-Z y con tildes
       
        if(nombre.value.trim() && !regexNombre.test(nombre.value)){
            errores.push('El nombre solo puede contener letras minúsculas, mayúsculas y tildes. Sin espacios al inicio o al final.');
        }

        if(nombre.value.trim() && nombre.value.length < 4){
            errores.push('El nombre debe tener al menos 4 caracteres.');
        }

        // Validar email
        const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(email.value.trim() && !regexEmail.test(email.value)){
            errores.push('El correo introducido no es valido.');
        }

        // Expresión regular para validar la contraseña
        // Asegura que haya al menos una letra mayúscula y un caracter especial 
        const regexContrasenia = /^(?=.*[A-Z])(?=.*[\W_]).+$/; 

        if (contrasenia.value.trim() && !regexContrasenia.test(contrasenia.value)) {
            errores.push('La contraseña debe contener al menos una letra mayúscula y un carácter especial (!@#$%^&*.,)');
        }

        // Validar que las contraseñas coincidan
        if (contrasenia.value && confirmContrasenia.value && contrasenia.value !== confirmContrasenia.value) {
            errores.push("Las contraseñas no coinciden.");
        }

        // Validar longitud y seguridad de la contraseña
        if (contrasenia.value && contrasenia.value.length < 8) {
            errores.push("La contraseña debe tener al menos 8 caracteres.");
        }

        if(errores.length > 0)  {
            alert.innerHTML = errores.join('<br>');
            alert.classList.remove('hidden');
        }else{
            alert.classList.add('hidden');
            // Envía el formulario
            formRegistro.submit();
        }
    });
    
}
function validarRestablecer(){
    const formRestablecer = document.querySelector('.restablecer-form');
    if (!formRestablecer) return; 

    const email = formRestablecer.querySelector('#email');
    const contrasenia = formRestablecer.querySelector('#contrasenia');
    const confirmContrasenia = formRestablecer.querySelector('#comfirm_contrasenia');
    const alert = formRestablecer.querySelector('.restablecer-form__alert');


    formRestablecer.addEventListener('submit', (e) =>{
        e.preventDefault();

       // Array para los errores
        let errores = [];

        if(!email.value.trim()){
            errores.push('El correo es obligatorio.');
        }
        if(!contrasenia.value.trim()){
            errores.push('La contraseña es obligatoria.');
        }
        if(contrasenia.value && !confirmContrasenia.value.trim()){
            errores.push('Confirma la contraseña.');
        }

        // Validar email
        const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(email.value.trim() && !regexEmail.test(email.value)){
            errores.push('El correo introducido no es valido.');
        }

        // Expresión regular para validar la contraseña
        // Asegura que haya al menos una letra mayúscula y un caracter especial 
        const regexContrasenia = /^(?=.*[A-Z])(?=.*[\W_]).+$/; 

        if (contrasenia.value.trim() && !regexContrasenia.test(contrasenia.value)) {
            errores.push('La contraseña debe contener al menos una letra mayúscula y un carácter especial (!@#$%^&*.,)');
        }

        // Validar que las contraseñas coincidan
        if (contrasenia.value && confirmContrasenia.value && contrasenia.value !== confirmContrasenia.value) {
            errores.push("Las contraseñas no coinciden.");
        }

        // Validar longitud y seguridad de la contraseña
        if (contrasenia.value && contrasenia.value.length < 8) {
            errores.push("La contraseña debe tener al menos 8 caracteres.");
        }

        if(errores.length > 0)  {
            alert.innerHTML = errores.join('<br>');
            alert.classList.remove('hidden');
        }else{
            alert.classList.add('hidden');
            // Envía el formulario
            formRestablecer.submit();
        }
    });
    
}
function validarAcceder(){
    const formAcceder = document.querySelector('.acceder-form');
    if (!formAcceder) return; 

    const email = formAcceder.querySelector('#email_acceder');
    const contrasenia = formAcceder.querySelector('#contrasenia_acceder');
    const alert = formAcceder.querySelector('.acceder-form__alert');


    formAcceder.addEventListener('submit', (e) =>{
        e.preventDefault();

       // Array para los errores
        let errores = [];

        if(!email.value.trim()){
            errores.push('El correo es obligatorio.');
        }
        if(!contrasenia.value.trim()){
            errores.push('La contraseña es obligatoria.');
        }

        // Validar email
        const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(email.value.trim() && !regexEmail.test(email.value)){
            errores.push('El correo introducido no es valido.');
        }

        if(errores.length > 0)  {
            alert.innerHTML = errores.join('<br>');
            alert.classList.remove('hidden');
        }else{
            alert.classList.add('hidden');
            // Envía el formulario
            formAcceder.submit();
        }
    });
    
}

function validarContacto(){
    const formContacto = document.querySelector('.contacto-form');
    if (!formContacto) return; 
    const nombre = formContacto.querySelector('#nombre');
    const email = formContacto.querySelector('#email');
    const telefono = formContacto.querySelector('#telefono');
    const mensaje = formContacto.querySelector('#mensaje');
    const alert = formContacto.querySelector('.contacto-form__alert');


    formContacto.addEventListener('submit', (e) =>{
        e.preventDefault();

       // Array para los errores
        let errores = [];
        
        if(!nombre.value.trim()){
            errores.push('El nombre es obligatorio.');
            nombre.focus();
            
        }
        if(!telefono.value.trim()){
            errores.push('El teléfono es obligatorio.');
        }
        if(!email.value.trim()){
            errores.push('El correo es obligatorio.');
        }
       
        if(!mensaje.value.trim()){
            errores.push('El mensaje es obligatorio.');
        }

        // validar nombre
        if(nombre.value && nombre.value.length < 4){
            errores.push('El nombre debe tener al menos 4 caracteres.');
        }

        // Validar email
        const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(email.value.trim() && !regexEmail.test(email.value)){
            errores.push('El correo introducido no es valido.');
        }

        // validar telefono
        const regexTelefono = /^[6789][0-9]{8}$/ ;

        // Valida el input en tiempo real
        telefono.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, ''); // Permite solo números
            if (this.value.length > 9) {
                this.value = this.value.slice(0, 9); // Solo 9 dígitos
            }
        });
        
        if(telefono.value.trim() && telefono.value.length !== 9) {
            errores.push('El número de teléfono debe contener 9 dígitos.');
        }

        if(telefono.value.length == 9 && !regexTelefono.test(telefono.value)) {
            errores.push('El teléfono debe empezar por 6, 7, 8 ó 9.');
        }
        
        if(errores.length > 0)  {
            alert.innerHTML = errores.join('<br>');
            alert.classList.remove('hidden');
        }else{
            alert.classList.add('hidden');
            // Envía el formulario
            formContacto.submit();
        }
    });
    
}

function inputFile(){
    const input = document.querySelector('#imagen_cartelera');
    const imagenPreview = document.querySelector('.imagen-preview .figure');

    if (!input && !imagenPreview) return; 

    // Caprtura el evento de cambio del input
    input.addEventListener('change', function(e){
        const inputEvent = e.target;
        const archivo = inputEvent.files[0];
        const nombreArchivo = document.querySelector('.nombre-archivo-cartelera');

        if(archivo){
            const reader = new FileReader(); // Para mostrar el archivo en la imagen antes de enviar al servidor

            // comprueba si ya existe una imagen y la elimina
            const imagenExistente = imagenPreview.querySelector('img');
            if (imagenExistente) {
                imagenExistente.remove();
            }

            reader.addEventListener('load', function(e){
                const readerTarget = e.target;
                const img = document.createElement('img');

                img.src = readerTarget.result; // tiene la url del archivo
                img.classList.add('figure-img', 'img-fluid', 'rounded', 'shadow');
                img.alt = 'Imagen de la cartelera seleccionada.';

                imagenPreview.appendChild(img);
            });
            reader.readAsDataURL(archivo); // Cuando se termina la lecutra de archivo es cuando se ejecuta el evento load
        }

        if(inputEvent.files.length > 0){
            nombreArchivo.textContent = inputEvent.files[0].name; // Obtenemos el nombre del primer archivo
        }else{
            nombreArchivo.textContent = 'Subir archivo';
        }
    });
}