# TaskBoard - Guia practica

**PRESENTADO POR:**

Brandon Misael Rodríguez Ayala

Carné: RA-60677-21

Proyecto PHP 8.1+ sobre namespaces, Composer y PDO.

## Instalacion

```powershell
composer install
```

Si Composer no esta instalado, descargalo desde https://getcomposer.org/download/.

## Namespaces y librerias

```powershell
php index.php
php test_tablero.php
php test_reporte.php
php probar_carbon.php
php probar_uuid.php
```

## Base de datos

1. Inicia MySQL en XAMPP, Laragon o WampServer.
2. Ejecuta `schema.sql` desde phpMyAdmin o MySQL.
3. Si es necesario, configura `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER` y `DB_PASSWORD`.
4. Comprueba la conexion:

```powershell
php probar_conexion.php
```

## CRUD

```powershell
php insertar_tarea.php
php listar_tareas.php
php actualizar_tarea.php 1
php eliminar_tarea.php 1
php insertar_tablero.php
php listar_tableros.php
php menu.php
```

Los scripts de base de datos usan consultas preparadas para valores externos. No subas `vendor/` a Git; `composer.lock` si debe versionarse.
