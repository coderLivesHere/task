@extends('layouts.app')

@section('title')
    Создание записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Добавление жанра</h1>
        <hr>
        <form action="{{ route('genres.store') }}" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            @method('post')
            <div class="mb-3">
                <label for="Name_Genre" class="form-label">Название жанра</label>
                <input id="Name_Genre" class="form-control" type="text" name="name" placeholder="Введите название жанра" />
            </div>
            <hr>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Добавить</button>
            </div>
        </form>
    </div>
@endsection
