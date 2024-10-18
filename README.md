# Generación de PDF Dinámico con Laravel y Pdftk

## Descripción del Proyecto
Este proyecto utiliza **Laravel** y la librería **php-pdftk** para generar PDFs dinámicos rellenando formularios con datos provenientes de la base de datos. El objetivo es permitir la creación de reportes PDF con información personalizada utilizando una combinación de datos del servidor y formularios PDF predefinidos.

---
## Pasos Realizados

### Instalación de Laravel y Configuración Básica
1. Se instaló Laravel y se generó un nuevo proyecto con el siguiente comando:
  ```
  composer create-project --prefer-dist laravel/laravel pdftk

 ```
2. Instalar  pdftk con brew, depende del SO:
 ```
 
 brew install pdftk-java
 ```
3. Se instaló la librería **php-pdftk** mediante Composer (la version que se cuenta es la ^0.13.1 ):
 ```
composer require mikehaertl/php-pdftk:^0.13.1
composer require mikehaertl/php-pdftk
 ```
4. Comando para verificar la instalación de `pdftk`:
  ```
  pdftk --version
  ```
5. Con estos pasos ya es posible interactuar con pdftk y manipular documentos



