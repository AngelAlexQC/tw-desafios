@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-3">
                    <form action="{{ route('publications.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>
                                Nueva publicación
                            </h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Escribe el título de tu publicación">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control" name='content' id='content' rows="3"
                                    placeholder="Escribe el contenido de tu publicación"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mb-3">
                    {{ $publications->links() }}
                </div>
                @foreach ($publications as $publication)
                    <div class="card mb-3 cursor-pointer">
                        <div class="card-header">
                            {{ $publication->title }}
                            <div class="text-right">
                                {{ $publication->user->name }}.&nbsp;{{ \Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $publication->content }}
                        </div>
                        <a href="{{ route('publications.show', $publication->id) }}" class="stretched-link"></a>
                    </div>
                @endforeach
                <div class="mb-3">
                    {{ $publications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
