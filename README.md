# petsense
Iot project of healthcare of dogs / Proyecto Iot para el cuidado de la salud de perros.

Se trata de un entorno WSL(Windows Subsystem Linux) en la que he creado un app web basada en PHP, Javascript, HTML y CSS. Su función es la visualización y registro de datos remotos de los sensores del dispositivo Petsense. Un dispositivo que funciona basado en un sistema IoT(Internet of Things) que mediante el uso de diferentes sensores es capaz de recolectar información importante sobre el estado actual de la mascota(Localización, Salud, Actividad, Medioambiente).

A continuación, comentaré la descripción detallada de la estructura del código:

Carpeta App:
Es donde contiene diferentes carpetas de scripts de PHP que están orientadas en un proyecto MVC (Modelo-Vista-Controlador) que están organizados en la siguiente estructura de carpetas:  config, Controllers, Models, Views y Templates.

config --> Es una carpeta donde tenemos archivos .json separados que se utilizan para guardar información importante tal como credenciales de bases de datos y demás.
Controllers --> Son los scripts que reciben la petición del usuario, procesan la lógica necesaria y coordinan la interacción entre los modelos y las vistas.
Models --> Se encargan de pensar la lógica que tiene que seguir la aplicación web (Consultas a bases de datos, analisís y algoritmos)
Views --> Carpeta donde se encuentra scripts PHP pero que contienen código HTML para la parte visual que se renderiza y se muestra al usuario en el navegador.
Templates --> Carpeta adicional que tiene scripts Twig, un motor de plantillas rapido y sencillo para PHP y que usamos para añadir más contenido a las plantillas de Views.

Carpeta Core:
Carpeta que contiene los diferentes archivos PHP que son el núcleo del framework o aplicación. Son las clases esenciales que dan soporte a todo lo demás y que hacen que la aplicación funcione correctamente. Ejemplos:
Controller.php	--> Clase base que extienden todos los controladores. 
App.php	--> Inicializa la aplicación, carga configuraciones, arranca el router, etc.
Database.php --> Clase que maneja la conexión con la base de datos(PDO).
View.php --> Renderiza las vistas para la aplicación web, cargando las plantillas HTML y Twig.

Carpeta html:
Es el directorio raiz del proyecto donde inicializa la aplicación y permite que sea accesible desde el navegador. Además contiene:
index.php --> Archivo que lanza la aplicación. Carga el entorno, las rutas, y se inician los controladores necesarios.
Assets --> Carpeta que contiene hojas de estilo (CSS), scripts JavaScript, imágenes, fuentes, íconos, etc. Importante para el diseño y la visualización de datos en la apliación web
cache --> Directorio usado para almacenar archivos generados, como versiones precompiladas de plantillas .twig, fragmentos de HTML, o respuestas temporales.

node_modules --> Contiene todas las dependencias y paquetes instalados a través de npm (Node Package Manager) para su uso en el Javascript de la aplicación web.

vendor --> Carpeta donde Composer, el gestor de dependencias de PHP, guarda todas las librerías PHP externas que la aplicación necesita.

bootstrap.php --> Archivo lanzando por index.php para seguir con la inicialización de la aplicación que se encarga de cargar configuraciones base, clases esenciales y dependencias comunes para que toda la aplicación funcione correctamente.

composer.json --> Archivo de configuración principal de Composer
composer.lock --> Archivo que se genera automáticamente cuando instalamos o actulizamos librerias y muestra las versiones exactas de dichas librerias instaladas por Composer.

croninflux.php --> Archivo que se ejecuta de manera aútomatica gracias al servicio Cron, un servicio de tareas programadas. El script se encarga de guardar datos de información en la base de datos InfluxDB

Gruntfile.js --> Task runner de JavaScript ayuda a automatizar tareas repetitivas como recargar el navegador automáticamente y minificar CSS, JavaScript o imágenes.

package.json --> Archivo principal de configuración de Node.js 
package-lock.json --> Archivo generado automáticamente por npm cuando instalas dependencias. 

