# Desafíos TWGroup

### Desafío 1:

Modificar el archivo .env con las credenciales de la base de datos
(La base de datos debe de estar creada con cualquier nombre).

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tw_desafios
DB_USERNAME=root
DB_PASSWORD=
```

Crear una cuenta en Mailtrap, buscar la integracion con Laravel.

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxxxxxxxxx
MAIL_PASSWORD=xxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
```

Configurar Redis, debe estar instalado e iniciado.

```
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_DB=tw
```

Luego se ejecuta el comando

```
php artisan migrate:fresh
```

Y el proyecto queda listo para empezar a desarrollar
