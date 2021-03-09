@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
