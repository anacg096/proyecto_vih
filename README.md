<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


<details>
  <summary>Tabla de contenidos</summary>
  <ol>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
  </ol>
</details>

<!-- GETTING STARTED -->
## Getting Started

How you start with the project:

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.

```sh
  composer install
```

Configure your .env with your database conection

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=proyecto_vih
    DB_USERNAME=root
    DB_PASSWORD=
    DB_COLLATION=utf8mb4_unicode_ci   
```

### Installation

1. First of all you need to create the database in phpmyadmin or in your sql editor.

```sh
    CREATE DATABASE proyecto_vih;  
```
2. Exectue all the migrations:

```sh
    php artisan migrate
```

3. Insert the SQL statements into the database for the 'preguntas_frecuentes' and 'users' tables.

```sh
    INSERT INTO `preguntas_frecuentes` (`id`, `name`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
    (1, 'CHEMSEX', 0x313731333138303835352e706e67, '¿Pasaría algo si algún fin de semana practico Chemsex?', '<p class="parrafo__contenido">Los HSH que practican <a href="#" class="destacado">Chemsex</a> tienen más probabilidades de sufrir <strong>depresión, ansiedad o dependencia de sustancias</strong>.</p><p class="parrafo__contenido">El uso de drogas chemsex constituye una barrera importante en la consecución de una <strong>adherencia</strong> óptima.</p>', '2024-04-15 09:34:15', '2024-04-15 09:34:15'),
    (2, 'ALCOHOL', 0x313731333138303931312e706e67, '¿Cómo puede afectar el consumo de alcohol?', '<p class="parrafo__contenido">El abuso de <span class="destacado">alcohol</span> es un importante problema de <strong>bienestar emocional</strong>.</p><p class="parrafo__contenido">El consumo de alcohol en exceso, aunque sea esporádico, puede afectar a la <strong>adherencia</strong> y perjudicar el resultado del TAR.4</p>', '2024-04-15 09:35:11', '2024-04-15 09:35:11'),
    (3, 'BIENESTAR EMOCIONAL', 0x313731333138303939312e706e67, '¿Pueden los determinantes sociales crear un contexto de vulnerabilidad y riesgo de VIH?', '<p class="parrafo__contenido">Las poblaciones vulnerables presentan altas tasas de <strong>malestar emocional y de trastornos mentales</strong>.</p><p class="parrafo__contenido">Las características <strong>sociodemográficas</strong> están ligadas y son determinantes en el nivel de adherencia del TAR.</p>', '2024-04-15 09:36:31', '2024-04-15 09:36:31'),
    (4, 'ESTIGMA', 0x313731333138313032372e706e67, '¿Cómo puede afectar el estigma a personas con VIH?', '<p class="parrafo__contenido"> El <a href="#" class="destacado">estigma</a> no exteriorizado se asoció con peor <strong>bienestar emocional y físico</strong>.</p><p class="parrafo__contenido">El autoestigma, los sentimientos de culpa y la ausencia de soporte social o familar pueden disminuir la <strong>adherencia</strong>.</p>', '2024-04-15 09:37:07', '2024-04-15 09:37:07'),
    (5, 'DETERMINANTES SOCIALES', 0x313731333138313038302e706e67, '¿Pueden los determinantes sociales crear un contexto de vulnerabilidad y riesgo de VIH?', '<p class="parrafo__contenido">Una situación emocional y social cambiante puede afectar a la <strong>comorbilidad psiquiátrica</strong>.</p><p class="parrafo__contenido">El diagnóstico o los síntomas de las comorbilidades psiquiátricas son una barrera en el cuidado de las personas con VIH. Algunas, como la depresión, están asociadas a una peor <strong>adherencia</strong> al TAR.</p>', '2024-04-15 09:38:00', '2024-04-15 09:38:00');
```

```sh
    INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `permissions`) VALUES
    (1, 'admin', 'admin@admin.com', NULL, '$2y$12$.eO1bLb/FhFakz8ImqojueLBtyJg5u0459SdfrxNqfYks1KSo/LFC', 'lscMwGNVJKHuAqlUjrxAl7VFzxNiYaeRaY6GW6g2uEzaHmFzZr0k9wCv6h7R', '2024-04-12 08:28:51', '2024-04-12 08:28:51', '{\"platform.index\": true, \"platform.systems.roles\": true, \"platform.systems.users\": true, \"platform.systems.attachment\": true}'),
    (2, 'user', 'user@user.com', NULL, '$2y$12$5Z2XU/B.8l602JqPhfdH7.rcyr1eNd.e6QSCNZosYjNjB8pF6.O6i', NULL, '2024-04-12 08:35:27', '2024-04-12 08:35:27', NULL),
    (3, 'a', 'a@a.com', NULL, '$2y$12$5uQ7ki2li1KPpujB0OPzbeqXP3IMwsCfgLn8G98LJ16S9ScWD3OaS', NULL, '2024-04-12 08:39:40', '2024-04-12 08:39:40', NULL);
```

4. Finally start the server

```sh
    php artisan serve
```

The password of the users is 123456789

5. If you want to create a new admin, insert this example of statement:

```sh
    php artisan orchid:admin admin admin@admin.com password
```

You can access to admin page with your admin account in the route "/login" (breeze form) or "/admin/login" (orchid form).