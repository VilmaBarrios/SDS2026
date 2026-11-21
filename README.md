# Blog Semana de Sistemas 2026

Aplicación web desarrollada con Laravel para registrar, organizar y divulgar las experiencias reales de las actividades de la Semana de Sistemas 2026 de la Universidad de El Salvador, Facultad Multidisciplinaria Oriental.

**Asignatura:** Técnicas de Programación para Internet

**Integrantes:**
Vilma Mercedes Barrios Reyes
Vilma Maria Gutierrez Juarez
Dayna Rebeca Moreno Santiago

## Tecnologías

Laravel, PHP, PostgreSQL, Blade, Bootstrap 5, Eloquent ORM y Docker.

## Funcionalidades

- Página de inicio con presentación del proyecto.
- Inicio de sesión, registro y cierre de sesión.
- Roles: **administrador** (gestiona todo) y **usuario** (solo consulta publicaciones).
- CRUD de publicaciones con título, fecha, categoría, contenido, autores, imagen principal, galería de imágenes y estado (borrador/publicado).
- CRUD de categorías.
- Búsqueda de publicaciones y filtro por categoría.
- Modo claro y oscuro, diseño adaptable a computadora y teléfono.

## Instalación

1. Clonar el repositorio y entrar a la carpeta del proyecto.

2. Copiar `www/.env.example` a `www/.env` y configurar la base de datos:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=db
   DB_PORT=5432
   DB_DATABASE=sds2026
   DB_USERNAME=postgres
   DB_PASSWORD=root123
   ```

3. Levantar los contenedores e instalar dependencias:

   ```
   docker compose up -d --build
   docker compose exec servidor composer install
   docker compose exec servidor php artisan key:generate
   ```

4. Cargar la base de datos con las publicaciones:

   ```
   docker compose cp respaldo.sql db:/tmp/respaldo.sql
   docker compose exec db psql -U postgres -d sds2026 -f /tmp/respaldo.sql
   docker compose exec servidor php artisan storage:link
   ```

5. Abrir en el navegador: http://localhost:8084

## Acceso

| Rol | Correo | Contraseña |
|---|---|---|
| Administrador | admin@blog.test | password |

Los usuarios nuevos pueden registrarse desde la página de inicio con el rol de usuario.