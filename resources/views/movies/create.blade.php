@extends('layouts.app')

@section('title')
    Создание записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Добавление фильма</h1>
        <hr>
        <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            @method('post')
            <div class="mb-3">
                <label for="Name_Movie" class="form-label">Название фильма</label><br />
                <input id="Name_Movie" class="form-control" type="text" name="name" placeholder="Введите название фильма" />
            </div>
            <hr>
            <div class="mb-3">
                <label for="Movie_Poster" class="form-label">Постер фильма</label><br />
                <input id="Movie_Poster" class="form-control" type="file" name="poster" />
            </div>
            <hr>
            <div class="mb-3">
                <label for="Genre_Movie" class="form-label">Жанр фильма</label><br />
                <select id="Genre_Movie" class="form-control" name="genre">
                    @foreach ($genresData as $element)
                        <option value={{ $element->id }}>{{ $element->name }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label for="Status_Movie" class="form-label">Фильм вышел?</label><br />
                <input id="Status_Movie" class="form-check-label" type="checkbox" name="status" />
            </div>
            <hr>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Добавить</button>
            </div>
        </form>
    </div>
@endsection
