
## PROYECTO

Lo que se requiere es lo siguiente, ocupamos hacer una tienda en línea, una página principal mostrando un catálogo de productos “Landing/Catalog Page”, una página que muestra el la información del producto seleccionado “Product Details”, y otra pantalla más colocando lo que sería un “Checkout Page” así como un pequeño administrador para los usuarios y productos.


## ADMINISTRADOR

Crear un Administrador de productos completamente funcional usando la ruta /admin/products

Listado de todos los productos

Agregar un producto

Borrar un Producto

Editar un producto


Crear un Administrador de usuarios completamente funcional usando la ruta /admin/users

Listado de Usuarios

Agregar un Usuario

Borrar un Usuario

Editar Usuario


## TABLAS

Base de Datos y Migraciones
Se tienen que crear las migraciones usando laravel y las tablas tienen que tener los siguientes datos


**Usuarios

id

name

email

password 



Productos

id 

name

slug 

(tiene que ser el nombre del producto sin espacios o caracteres especiales separados por un “-”, revisar helper de laravel para slugs)

description

price



Media

id

idProducto

file




## API REST

Se creará una REST API para dos catálogos con todo su CRUD, los Catalogos son
/api/products
/api/users
/api/media 


## INSTALACION DE COMPOSER

composer global require laravel/installer
composer create-project --prefer-dist laravel/laravel online-store 6.2.*


## INSTALACION DE LAS DEPENDENCIAS 

npm install vue vue-router vuetify jquery axios --save


## INSTALACION DE Spatie de Media Library

composer require spatie/laravel-medialibrary:^7.0.0
