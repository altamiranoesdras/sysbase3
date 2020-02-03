<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Instalación
 
 ### Programas necesarios

  #### Laragon https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-full.exe
        
  #### Visual studio code  https://code.visualstudio.com/Download    
 
 ### Crear una base de datos llamada sysbase3
   
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
    npm install 
    
  #### crear archivo de entornos
  
    cp .env.example .env   
    
  ##### generar clave de encryptacio para seguridad de la aplicación
    php artisan key:generate  
  
  ##### crear tablas y datos
    php artisan migrate --seed
    
  ##### Instalar clientes por defecto de Laravel Passport (Autenticación para apis) 
     php artisan passport:install
  
  ### Recargar servidor web de laragon para que se genere el virtual host
  
  ![](recargar_webserver_laragon.png)
     
  ### Puedes ingresar por el navegador con  http://sysbase3.local/   
     
  #### Credenciales de acceso
    Usuario : admin
    Password : admin
 


