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

# Desafío 3

#### **Consulta requerida desafío 3**

```
Publication::whereHas('comments', function ($q) {
    $q->where('content', 'LIKE', '%' . 'Hola' . '%')->where('status', Comment::STATUS_APROBADO);
})->get();
```

# Desafío 4

### Respuesta:

Si son bien usadas se les puede sacar el mejor provecho, ya que las migraciones se ejecutan una detrás de otra y solamente las nuevas, ademas los seeders (a pesar de que se usan para datos de prueba) se pueden aprovechar para llenar datos reales, todo depende de si la migracion afecta o no a la estructura de la base datos, por eso hay que definirla desde un principio de tal forma que no afecte la incorporacion de nuevas tablas, mejor dicho: si tu base de datos está bien normalizada, es escalable y sabes el funcionamiento correcto de las migraciones puedes hacer cambios sin miedo a perder tu información.

# Desafío 5

Primero se genera el scaffolding para la autenticación y bootstrap.

```
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev
```

Luego se procede a hacer cambios en los controladores y vistas (revisar código)
