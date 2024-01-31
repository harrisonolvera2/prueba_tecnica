# Blog App

Este proyecto es parte de una prueba técnica y consiste en una aplicación web simple para gestionar entradas de un blog.

## Descripción

La aplicación web permite realizar las siguientes acciones:

- **Listado de Entradas:** Muestra un listado de todas las entradas del blog.
- **Búsqueda de Entradas:** Permite buscar entradas por título.
- **Detalles de Entrada:** Muestra información detallada de una entrada específica.
- **Creación de Nueva Entrada:** Permite agregar nuevas entradas al blog.
- **Edición de Entrada:** Permite editar la información de una entrada existente.
- **Eliminación de Entrada:** Permite eliminar una entrada del blog.

## Tecnologías Utilizadas

- **Laravel (backend):** Framework de PHP para desarrollo web.
- **Bootstrap (frontend):** Framework de diseño para facilitar la maquetación.

## Diagrama de Flujo

A continuación se presenta un diagrama de flujo que representa el proceso general de la aplicación:

![Diagrama de Flujo](https://raw.githubusercontent.com/harrisonolvera2/prueba_tecnica/main/DIAGRAMA%20FLUJO%20PRUEBA.png)

Este diagrama proporciona una visión general del flujo de trabajo en la aplicación y puede ser útil para comprender cómo interactúan las diferentes funcionalidades.


## Instalación

Sigue estos pasos para instalar y ejecutar la aplicación localmente:

1. **Clona el Repositorio:**

   ```bash
   git clone https://github.com/tu_usuario/prueba-tecnica.git
Recuerda clonarlo en la ruta www o htdocs, dependiendo tu entorno local de desarrollo (WAMP, LAMP, XAMPP).

2. **Instala las Dependencias:**

   ```bash
   composer install
   npm install

3. **Configura la Base de Datos:**

   - Configura en `.env`la base de datos con tus ajustes predifinidos de MySQL.
   - Ejecuta las migraciones para generar las tablas en la BD:

     ```bash
     php artisan migrate
     ```

4. **Inicia el Servidor de Desarrollo:**

   ```bash
   php artisan serve
Podras acceder con la siguiente ruta http://127.0.0.1:8000/entradas.

Puedes también ejecutarlo desde el inicio de apache con la ruta del localhost http://localhost/prueba_tecnica/public/entradas.

5. **Uso:**

Accede a la aplicación y explora las diferentes funcionalidades.
Gestiona las entradas del blog, busca y visualiza detalles de cada entrada.

6. **Endpoints del Servicio REST:**

La aplicación cuenta con un servicio REST que proporciona endpoints para interactuar con las entradas del blog.

- **Obtener Todas las Entradas:**

Endpoint: GET http://127.0.0.1:8000/api/entradas (o la URL correspondiente en tu entorno).

Descripción: Obtiene todas las entradas del blog.

Uso: Realiza una solicitud GET a la URL http://127.0.0.1:8000/api/entradas (o la URL correspondiente en tu entorno).
La respuesta será una lista de todas las entradas en formato JSON.

- **Obtener Entrada por ID:**

Endpoint: GET http://127.0.0.1:8000/api/entradas/{id}

Descripción: Obtiene una entrada específica por su ID.

Uso: Realiza una solicitud GET a la URL http://127.0.0.1:8000/api/entradas/{id} donde {id} es el ID de la entrada que deseas obtener. La respuesta será la información de la entrada en formato JSON.

- **Crear Nueva Entrada:**

Endpoint: POST http://127.0.0.1:8000/api/entradas

Descripción: Crea una nueva entrada en el blog.

Uso: Realiza una solicitud POST a la URL http://127.0.0.1:8000/api/entradas con los datos de la nueva entrada en formato JSON en el cuerpo de la solicitud.

Ejemplo:
    
    {
        "titulo": "Entrada desde Insomnia con API REST",
        "autor": "API REST",
        "fecha_publicacion": "2024-01-31",  
        "contenido": "Prueba de contenido desde API"
    }
    
La respuesta será la información de la entrada recién creada en formato JSON.

## Prueba la API REST con Insomnia

Si deseas probar los endpoints de la API REST de esta aplicación, he preparado una colección de Insomnia que puedes utilizar. Esta colección incluye solicitudes para los diferentes endpoints, como obtener todas las entradas, obtener una entrada por ID y crear una nueva entrada.

### Instrucciones:

1. Abre Insomnia.

2. Importa la colección directamente desde el archivo en la raíz del proyecto: [Colección_API_REST_Insomnia.json](https://github.com/harrisonolvera2/prueba_tecnica/blob/main/Colecci%C3%B3n_API_REST_Insomnia.json).

3. ¡Listo! Ahora puedes utilizar la colección para realizar solicitudes a la API REST directamente desde Insomnia.

Recuerda ajustar las configuraciones de entorno en Insomnia según tu configuración local.

¡Disfruta explorando la API REST de la aplicación!


## Contribuciones

¡Contribuciones son bienvenidas!

Si encuentras algún problema o tienes sugerencias, por favor crea un issue o envía un pull request.
