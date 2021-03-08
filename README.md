# Desafíos TWGroup

## Desafío 1:

Modificar el archivo .env con las credenciales de la base de datos
(La base de datos debe de estar creada con cualquier nombre).

#### **`.env`**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tw_desafios
DB_USERNAME=root
DB_PASSWORD=
```

Crear una cuenta en Mailtrap, buscar la integracion con Laravel.

#### **`.env`**

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxxxxxxxxx
MAIL_PASSWORD=xxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
```

Configurar Redis, debe estar instalado e iniciado.

#### **`.env`**

```
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_DB=tw
```

Luego se ejecuta el comando

#### **`console`**

```
php artisan migrate:fresh
```

Y el proyecto queda listo para empezar a desarrollar

## Desafío 2:

Despues de crear el modelo y migraciones con sus llaves foraneas:

#### **`create_publications_table.php`**

```
 Schema::create('publications', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->longText('content');
    $table->foreignId('user_id')->references('id')->on('users');
    $table->timestamps();
});
```

#### **`create_comments_table.php`**

```
Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('publication_id')->references('id')->on('publications');
    $table->longText('content');
    $table->enum('status', [
        Comment::STATUS_PENDIENTE,
        Comment::STATUS_APROBADO,
        Comment::STATUS_RECHAZADO
    ])->default(Comment::STATUS_PENDIENTE);
    $table->timestamps();
});
```

Se definen las relaciones en los modelos:

#### **`Publication.php`**

```
/**
* Get the comments for the publication.
*/
public function comments()
{
    return $this->hasMany(Comment::class);
}
```

#### **`Comment.php`**

```
const STATUS_PENDIENTE = 'Pendiente de Revisión';
const STATUS_APROBADO = 'Aprobada';
const STATUS_RECHAZADO = 'Rechazada';
/**
* Get the publication that owns the comment.
*/
public function publication()
{
    return $this->belongsTo(Publication::class);
}
```
