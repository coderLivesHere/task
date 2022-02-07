@extends('layouts.app')

@section('title')
    Просмотр записи
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Фильм</h1>
        <hr>
        <div class="row">
            <div class="mb-3">
                <img src="{{ $movieElement->getPostersPath().$movieElement->poster }}">
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-3">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Название</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Жанр</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Статус</a>
                    </div>
                </div>
                <hr>
                <div class="col-4 d-flex justify-content-end">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">{{ $movieElement->name }}</div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">{{ $genreElement->name }}</div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">{{ $movieElement->status ? 'Вышел' : 'В разработке' }}</div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary" href={{ "/movies/".$movieElement->id."/edit" }}>Редактировать</a>
                <form action={{ "/movies/".$movieElement->id }} method="post">
                    @csrf <!-- {{ csrf_field() }} -->
                    @method('delete')
                    <input name="id" type="hidden" value={{ $movieElement->id }} />
                    <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
