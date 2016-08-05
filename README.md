# Demo parkiller
Este es un demo creado con Codeigniter como **MVC** principal implementando **Webscokets**, **Angular** y otras tecnologias web.


### Como instalarlo :

1) Es necesario tener montado un servidor local, en este caso yo use **MAMP**

2) Crear la carpeta **parkiller** dentro de htdocs **/MAMP/htdocs/** y copiar todo el contenido descargado dentro de la nueva carpeta /MAMP/htdocs/parkiller/

3) Al Iniciar los servidores debemos abrir el phpmyadmin y crear la base de datos **parkiller** despues importaremos la BD  **parkiller.sql** aqui incluida dentro de la nueva BD. **Es importante que la BD tenga el nombre parkiller, de lo contrario se deberia cambiar la configuracion dentro del archivo database.php en la carpeta /application/config/, asi mismo asumimos que los accesos de control son root como usuario y root como password de lo contrario deberiamos cambiar la configuracion por igual.

4) Debemos conocer la IP de la maquina actual

5) Una vez tengamos la IP debemos abrir el archivo **contants.php** que esta ubicado en **/application/config/contants** y reemplazar la constante **BROADCAST_URL**
 

6) Debemos abrir la terminal para iniciar el socket que nos permitira tener el control de los cambios dentro del administrador, para ello desde la terminal nos dirigimos a la carpeta **\application\third_party\Realtime\bin** y ejecutamos el siguiente codigo:

```sh
 php server.php
  ```

7) Si no ocurrio ningun error, desde algun navegador abrimos la URL del administrador **localhost:8888/parkiller/index.php/Mapa** y en otra pestaña la URL del Mapa **http://localhost:8888/parkiller/index.php/Mapa/cliente**

8) !Eso es todo¡, ahora solo queda desde el administrador agregar Clientes y Conductores Parkiller, al hacer esto automaticamente se actualizara el contenido de la pestaña Mapa con las rutas mas cortas entre conductores y clientes.

Hay bastante mejoras en este demo, como por ejemplo, no tener que poner forzozamente las coordenadas de ubicación, otra seria que al hacer el drag de los marker se calculara de nuevo las rutas, etc.

Saludos!