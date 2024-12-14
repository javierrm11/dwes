# Título: "Gestión de Tareas Personales"
## Descripción:
Debes desarrollar una aplicación en PHP para gestionar una lista de tareas personales. La aplicación permitirá a un usuario registrarse, iniciar sesión, y administrar sus tareas. Las tareas se almacenarán en un fichero, y las operaciones disponibles serán: añadir, marcar como completada, eliminar y listar tareas.

El examen tiene una duración de 2 horas. Se evaluará el uso correcto de cookies, sesiones, formularios, arrays, bucles, y gestión de ficheros.

## Requisitos del Sistema
### Registro e Inicio de Sesión:

- El usuario podrá registrarse ingresando un nombre de usuario y una contraseña. Estas credenciales se almacenarán en un fichero usuarios.txt en formato usuario:contraseña.
- El usuario podrá iniciar sesión con las credenciales registradas.
- Al iniciar sesión, el sistema usará una sesión para mantener al usuario autenticado.

### Gestión de Tareas:

Cada usuario tendrá su propio fichero de tareas (tareas_[usuario].txt) donde se almacenarán las tareas en formato texto.
Las tareas se guardarán como un array serializado, con cada tarea representada por un array asociativo con las claves:
php
```php
[
    'tarea' => 'Descripción de la tarea',
    'completada' => false
]
```
## Operaciones Disponibles:

- Añadir una tarea: El usuario podrá añadir una tarea desde un formulario.
- Listar tareas: Mostrar las tareas del usuario actual con un formulario para marcar como completadas o eliminarlas.
- Marcar como completada: Cambiar el estado de una tarea a completada.
- Eliminar una tarea: Eliminar una tarea de la lista.

## Cookies:

- Utiliza una cookie para recordar al usuario y mostrar un mensaje de bienvenida personalizado en caso de que ya haya iniciado sesión anteriormente.
## Cierre de Sesión:

- Debe haber una opción para cerrar sesión que destruya la sesión y redirija al usuario al formulario de inicio.




Condiciones de Entrega
El sistema debe ser funcional y cumplir con todos los requisitos.
Se valorará la claridad y limpieza del código.
No se permite el uso de frameworks, únicamente PHP puro.
El examen debe ejecutarse correctamente en un servidor local.
Ejemplo de Flujo de Trabajo
El usuario se registra ingresando su nombre de usuario y contraseña.
Inicia sesión con las credenciales registradas.
Gestiona sus tareas:
Añade una tarea con la descripción "Estudiar para el examen".
Marca la tarea como completada.
Elimina la tarea.
Cierra sesión y vuelve a iniciar sesión para verificar la persistencia de los datos.
Puntuación
Registro e Inicio de Sesión (20%): Funcionalidad de autenticación y almacenamiento en fichero.
Gestión de Tareas (40%): Correcta implementación de operaciones con tareas usando arrays, bucles y ficheros.
Cookies y Sesiones (20%): Uso adecuado de cookies para recordar al usuario y sesiones para autenticarlo.
Limpieza y Usabilidad (20%): Código limpio, comentarios adecuados, y formularios claros.