@extends('layouts.app')

@section('title')
    Редактирование записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Редактирование жанра</h1>
        <hr>
        <form action="{{ "/genres/".$id }}" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            @method('patch')
            <div class="mb-3">
                <label for="Name_Genre" class="form-check-label">Название жанра</label><br />
                <input id="Name_Genre" class="form-control" name="name" type="text" placeholder="Введите название жанра" value="{{ $genreElement->name }}" />
            </div>
            <hr>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Изменить</button>
            </div>
        </form>
    </div>
@endsection
