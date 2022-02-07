@extends('layouts.app')

@section('title')
    Все записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Список жанров</h1>
        <hr>
        <div class="mb-3">
            <ol class="list-group list-group-numbered">
                @foreach ($genresData as $element)
                    <li class="list-group-item">
                        <a class="link-primary" href={{ "/genres/".$element->id }}>{{ $element->name  }}</a>
                    </li>
                @endforeach
            </ol>
        </div>
        <hr>
        <div class="mb-3 d-flex justify-content-center">
            <a class="btn btn-primary" href="{{ route('genres.create') }}">Добавить</a>
        </div>
    </div>
@endsection
