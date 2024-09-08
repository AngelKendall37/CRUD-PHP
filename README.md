# Proyecto de Gestión de Menu dinamico, CRUD Personas y Departamentos

Este proyecto es un sistema web básico para la gestión de usuarios, menús dinámicos, personas y departamentos. Utiliza PHP para el backend y cuenta con funcionalidades de autenticación, CRUD (Crear, Leer, Actualizar y Eliminar) para personas y departamentos, y un sistema de navegación dinámico basado en roles de usuario.

## Funcionalidades principales

1. **Autenticación de usuarios**:
   - Registro y login de usuarios.
   - Gestión de sesiones seguras.
   - Redirección basada en roles.

2. **Gestión de Menú Dinámico**:
   - Los menús de navegación se generan dinámicamente desde una base de datos.
   - Soporte para menús jerárquicos (submenús).
   - CRUD de ítems de menú.

3. **Gestión de Personas y Departamentos**:
   - CRUD para la gestión de personas y la asignación de un departamento a cada persona.
   - Relación de personas con departamentos, mostrando toda la información en un listado.

## Estructura del Proyecto

- **Controladores**: Manejan la lógica de negocio y gestionan las peticiones HTTP.
  - `RegisterController`: Registro de nuevos usuarios.
  - `LoginController`: Autenticación de usuarios y manejo de sesiones.
  - `MenuController`: Gestión de menús dinámicos.
  - `PersonDepartController`: CRUD para personas y departamentos.

- **Modelos**: Gestionan la comunicación con la base de datos.
  - `UserModel`: Gestión de usuarios.
  - `MenuModel`: Gestión de ítems del menú.
  - `PersonDepartModel`: Gestión de personas y departamentos.

- **Vistas**: Archivos PHP que se encargan de la interfaz visual del sistema.

## Requisitos

- PHP 7.x o superior
- Servidor web (Apache, Nginx, etc.)
- Base de datos MySQL

## Instalación

1. Clonar el repositorio.
2. Configurar la base de datos e importar el archivo SQL correspondiente.
3. Configurar los detalles de la base de datos en los modelos.
4. Acceder al proyecto desde un servidor local (por ejemplo, `http://localhost/proyecto`).

## Uso

1. Registrar un usuario.
2. Iniciar sesión.
3. Navegar por el menú dinámico para gestionar personas y departamentos.

## Licencia

Este proyecto no tiene licencia y está diseñado como un ejemplo básico de sistema CRUD con PHP.
