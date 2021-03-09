@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-3">
                    <h4>
                        {{ $publication->title }}
                    </h4>
                    <div class="text-left mb-2">
                        {{ $publication->user->name }}.&nbsp;{{ \Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}
                    </div>
                    <p class="text-lg">
                        {{ $publication->content }}
                    </p>
                </div>
                <div class="mx-3">
                    <h6>
                        Comentarios ({{ count($publication->comments) }})
                    </h6>
                    @foreach ($publication->comments as $comment)
                        <div class="mb-3 border rounded px-2 py-1">
                            <small>
                                {{ $comment->user->name }}
                            </small>
                            <br>
                            {{ $comment->content }}
                        </div>
                    @endforeach
                    @if (count($publication->comments_by_me))
                        Ya ha comentado en esta publicación
                    @else
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="content">Escribe Algo</label>
                                <input id="publication_id" name="publication_id" type="hidden"
                                    value="{{ $publication->id }}">
                                <textarea class="form-control" name="content" id="content" rows="3"
                                    placeholder="Escribe tu opinión..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
