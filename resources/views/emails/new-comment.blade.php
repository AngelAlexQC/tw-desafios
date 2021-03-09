{{ $comment['user']['name'] }}, te notificamos que se ha publicado con éxito el comentario.
<br>
Puedes revisarlo en el siguiente link:
<br>
<a href="{{ URL::to('/publications/' . $comment['publication_id']) }}">
    Ver comentario
</a>
