**SIMULADOR DE PARKING**

Este es un simulador de parking desarrollado en PHP con el framework Laravel. Permite a los usuarios generar tickets de
entrada y pagarlos para poder salir del parking, y a los administradores llevar un control sobre los tickets y usuarios
registrados.

**INSTALACION**

- Clonar el repositorio
- Instalar las dependencias con composer install
- Configurar el archivo .env con la información de conexión a la base de datos
- Ejecutar las migraciones y seeds con php artisan migrate --seed
- Iniciar el servidor con php artisan serve --host=0.0.0.0 &

**USO**
**GENERACION DE TICKETS**

Para generar un ticket, el usuario debe acceder a la ruta /ticket/entrada. Se le generará un ticket con un código único
que
debe conservar para poder salir del parking posteriormente.

**PAGO DEL TICKETS**

Para pagar el ticket, el usuario debe acceder a la ruta /ticket/cajero e introducir su código de ticket. En caso de que
el
usuario tenga una tarifa asociada, se le aplicará el descuento correspondiente.

**SALIDA DEL PARKING**

Para salir del parking, el usuario debe acceder a la ruta /ticket/salida e introducir su código de ticket. Se comprobará
que el
ticket ha sido pagado y se levantará la barrera para permitir la salida.

**ADMINISTRACION DE TICKETS**

Los administradores pueden acceder a la sección de administración a través de la ruta /administracion/tickets. Desde
allí, pueden ver
todos los tickets generados, filtrar por fecha, estado, matrícula, código de ticket y editar tickets.

**ADMINISTRACION DE USUARIOS**

Los administradores también pueden acceder a la sección de administración de usuarios desde la ruta
/administracion/usuarios. Desde
allí, pueden ver todos los usuarios registrados, añadir usuarios nuevos, editar usuarios existentes y eliminar usuarios.
Además, pueden ver los tickets generados por un usuario en específico.

**TECNOLOGIAS UTILIZADAS**

- Laravel
- MySQL/MariaDB
- PHP
- Blade

**CONTRIBUCION**

Las contribuciones son bienvenidas. Si deseas contribuir a este proyecto, por favor abre un pull request o una issue.

**AUTOR**

Este proyecto fue creado por **Álvaro Gómez Méndez y Adrián Rodríguez Ordóñez**. Si tienes alguna pregunta o comentario,
por favor contáctanos por
correo electrónico a:

- alvarogm@iescastelar.com
- adrianro@iescastelar.com
