## Instalación

### Programas necesarios

#### Laragon https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

#### Visual studio code  https://code.visualstudio.com/sha/download?build=stable&os=win32-x64-user

#### Git  https://github.com/git-for-windows/git/releases/download/v2.42.0.windows.2/Git-2.42.0.2-64-bit.exe

### Crear una base de datos llamada sysbase

     (Esto en cualquier administrador de base de datos como heidi)

### Configuraciones para laragon

#### Cambiara {name}.test por {name}.local
![](preferencias_larago1.png)

#### Desmarcar casilla de apache, marcar casilla de Nginx y cambiar el puerto del mismo a 80

![](preferencias_larago2.png)

### Ejecutar los siguientes comando en la terminal que incluye laragon

![](terminal_laragon.png)

##### clonar repo
    git clone https://github.com/altamiranoesdras/sysbase3.git

##### Acceder a la carpeta
    cd sysbase3

##### instalar dependencias

    composer install 		

#### crear archivo de entornos

    cp .env.example .env   

##### generar clave de seguridad de la aplicación
    php artisan key:generate  

##### crear tablas y datos
    php artisan migrate --seed

##### crear enlace simbólico para carpeta storage
     php artisan storage:link

##### Instalar clientes por defecto de Laravel Passport (Autenticación para apis)
     php artisan passport:install

### Recargar servidor web de laragon para que se genere el virtual host

![](recargar_webserver_laragon.png)

### Puedes ingresar por el navegador con  http://sysbase.local/

#### Credenciales de acceso
    Usuario : dev
    Password : admin
 


