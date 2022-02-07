@extends('layouts.app')

@section('title')
    Просмотр записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Жанр</h1>
        <hr>
        <div class="d-flex justify-content-between mb-3">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Название</a>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">{{ $genreElement->name }}</div>

                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href={{ "/genres/".$genreElement->id."/edit" }}>Редактировать</a>
            <form action={{ "/genres/".$genreElement->id }} method="post">
                @csrf <!-- {{ csrf_field() }} -->
                @method('delete')
                <input name="id" type="hidden" value={{ $genreElement->id }} />
                <button class="btn btn-danger" type="submit">Удалить</button>
            </form>
        </div>
    </div>
@endsection
