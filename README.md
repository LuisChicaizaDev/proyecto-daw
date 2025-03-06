# Boxeo Project 🥊
**Trabajo Fin de Curso del Grado Superior de Desarrollo de Aplicaciones Web.**

<div align="center">
  <img src="https://github.com/user-attachments/assets/33b22c90-175d-4f82-a4c2-57aeb8eda065" style="width: 730px;">
</div>

**Boxeo Project** es una plataforma desarrollada para la publicación y promoción de veladas de boxeo. Su objetivo es facilitar la gestión de estos eventos, proporcionando herramientas para sus organizadores y ofreciendo información relevante a los aficionados a este deporte. 

## ⚙️️ Arquitectura del Proyecto
Para el desarrollo del proyecto, se implementó el patrón de arquitectura **MVC (Modelo – Vista – Controlador)**, que permite separar la lógica del proyecto en tres componentes distintos, lo cual facilita el mantenimiento del código. El **modelo** se encargó de interactuar con la base de datos, la **vista** de presentar la información de los datos al usuario y el **controlador** de la comunicación entre el modelo y la vista. Además, este proyecto sigue el paradigma de la **Programación Orientada a Objetos (POO)**.

## 📄 Características Principales
- **Registro de usuarios:** El usuario puede registrarse en el sitio web introduciendo un nombre de usuario, su correo electrónico y una contraseña. 

- **Inicio de sesión y autenticación:** El sitio web permite acceder al usuario previamente registrado, con su correo electrónico y contraseña. Además, autentica que el usuario exista para poder iniciar sesión. 

- **Gestión de veladas:** Los organizadores puedan crear veladas introduciendo la información como el tipo, imagen, lugar, fecha, hora, dirección, precio, nombre del promotor, descripción y crear hasta un máximo de 14 combates, además puede editar y eliminar las veladas creadas. 
- **Gestión de boxeadores:** El organizador puede registrar boxeadores 
proporcionando su nombre, apellido y peso. Además, pouede editar y eliminar sus
boxeadores registrados. 
- **Visualizar detalles de la velada:** Los usuarios que visitan el sitio web pueden acceder a toda la información detalla de cada velada, obteniendo detalles como la hora, el lugar, el precio, la cartelera del evento, sus combates y más información. 
- **Contactar con el Administrador:** El usuario puede ponerse en contacto con el administrador del sitio web, a través de un formulario de contacto introduciendo su nombre, correo electrónico, número de teléfono y escribiendo un mensaje con cualquier duda, problema o sugerencia.
- **Diseño Responsive:** El sitio web está optimizado para adaptarse a cualquier dispositivo ordenador, tablet y móvil.
- **Modo oscuro y claro:** El usuario puede elegir entre dos temas para una mejor experiencia. Por defecto, el tema respeta la preferencia del usuario en su sistema operativo.

## 🛠️ Tecnologías Utilizadas
- **Frontend:** HTML, CSS, Sass, Bootstrap y JavaScript.
- **Backend:** PHP con MySQL.
- **Herramientas:** Visual Studio Code, XAMPP, phpMyAdmin, Git y Github.

## 💾 Estructura Base de Datos 
La estructura de la base de datos de este proyecto se caracteriza por ser una base de datos relacional, lo que garantiza la integridad y consistencia de los datos.
Para gestionar los datos de las veladas, boxeadores y usuarios, se crearon las siguientes tablas:  
- **Usuario:** Almacena los datos de los usuarios que se registran en el sitio web para 
proceder a publicar sus veladas. 
- **Velada:** Registra la información de los eventos de boxeo creados por los usuarios. 
- **Boxeador:** Contiene los datos de los boxeadores que participarán en las veladas. 
- **Combate:** Guarda la relación de los combates con la velada a la que pertenecen. 
- **Participar:** Tabla intermedia que relaciona la tabla Boxeador con Combate, esta asocia a cada combate con un boxeador en específico. 

Las relaciones de las tablas son las siguientes: 
- **Usuario – Velada:** Relación de **1 a N**. Un usuario puede publicar muchas veladas, pero cada velada pertenece a un único usuario. 
- **Usuario – Boxeador:** Relación de **1 a N**. Un usuario puede registrar varios boxeadores, pero cada boxeador pertenece a un solo usuario. 
- **Velada – Combate:** Relación de **1 a N**. Una velada puede tener varios combates, pero cada combate puede pertenecer a una única velada. 
- **Combate – Boxeador:** Relación de **N a M**. Un combate tiene exactamente dos boxeadores y un boxeador pueden participar en varios combates en distintas veladas. 

## 🚀 Instalación y Configuración 
Para poner en marcha este proyecto en tu entorno local, sigue estos pasos:

1.  Descarga e instala [XAMPP](https://www.apachefriends.org/).
2. Clona el repositorio:
```sh
git clone https://github.com/LuisChicaizaDev/proyecto-daw.git
```
> [!IMPORTANT]
> Clona el repositorio en una carpeta que tenga como nombre **boxeoproject**, dentro de la carpeta `htdocs` de XAMPP.
> (por ejemplo: `C:/xampp/htdocs/boxeoproject`). 
3. Abre la aplicación de XAMPP e inicia los módulos **Apache** y **MySQL**.
4. Importa la Base de Datos:
+ Accede a [phpMyAdmin](http://localhost/phpmyadmin/). 
+ Crea una base de datos con el nombre exacto: **boxeoproject_crud**. 
+ En el menú superior haz clic en **Importar**.
+ Selecciona el archivo **boxeoproject_crud.sql**, que se encuentra en la carpeta 📁 `bbdd`, en la raíz del proyecto. 
+ Haz clic en **Importar** para que la base de datos se importe. 

5. Abre una terminal en la raíz del proyecto y ejecuta:
```sh
npm install 
```
```sh
composer install
```

6. Accede al Sitio Web:
- Ingresa la siguiente URL: http://localhost/boxeoproject/public/ 

## 💻 Demo
Puedes visualizar e interactuar con este proyecto en el siguiente enlace : [boxeoproject.free.nf](https://boxeoproject.free.nf/)

## 📜 Licencia
Este proyecto está bajo la licencia MIT. Puedes consultar el archivo `LICENSE` para más información.



