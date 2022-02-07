@extends('layouts.app')

@section('title')
    Все записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Список фильмов</h1>
        <hr>
        <div class="mb-3">
            <ol class="list-group list-group-numbered">
                @foreach ($moviesData as $element)
                    @if($element->moderated)
                        <li class="list-group-item">
                            <a class="link-primary" href="{{ '/movies/'.$element->id }}">{{ $element->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
        <hr>
        <div class="mb-3 d-flex justify-content-center">
            <a class="btn btn-primary" href="{{ route('movies.create') }}">Добавить</a>
        </div>
    </div>
@endsection
