@extends('layouts.app')

@section('title')
    Редактирование записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Редактирование фильма</h1>
        <hr>
        <form action={{ "/movies/".$id }} method="post" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            @method('patch')
            <div class="mb-3">
                <label for="Name_Movie">Название фильмы</label><br />
                <input id="Name_Movie" class="form-control" name="name" type="text" placeholder="Введите название фильма" value="{{ $movieElement->name }}" />
            </div>
            <hr>
            <div class="mb-3">
                <label for="Movie_Poster">Постер фильма</label><br />
                <input id="Movie_Poster" class="form-control" type="file" name="poster" />
            </div>
            <hr>
            <div class="mb-3">
                <label for="Genre_Movie">Жанр фильма</label><br />
                <select id="Genre_Movie" class="form-control" name="genre">
                    @foreach ($genresData as $element)
                        <option value={{ $element->id }}>{{ $element->name }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label for="Status_Movie" class="form-check-label">Фильм вышел?</label><br />
                <input id="Status_Movie" class="form-check-input" type="checkbox" name="status" {{ $movieElement->status == true ? 'checked=checked' : '' }} />
            </div>
            <hr>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Изменить</button>
            </div>
        </form>
    </div>
@endsection
