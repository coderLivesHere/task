@extends('layouts.app')

@section('title')
    Главная
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Разделы</h1>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item">
                <a class="link-primary" href="{{ route('movies.index') }}">Фильмы</a>
            </li>
            <li class="list-group-item">
                <a class="link-primary" href="{{ route('genres.index') }}">Жанры</a>
            </li>
            <li class="list-group-item">
                <a class="link-primary" href="{{ route('movies.moderation') }}">Модерация</a>
            </li>
        </ol>
    </div>
@endsection
