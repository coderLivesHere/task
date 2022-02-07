@extends('layouts.app')

@section('title')
    Записи для модерации
@endsection

@section('content')
    <div class="content">
        <h1 class="h1">Список фильмов</h1>
        <hr>
        <div class="mb-3">
            <ol class="list-group list-group-numbered">
                @foreach ($moviesData as $element)
                    @if(!$element->moderated)
                        <li class="list-group-item">
                            <span class="link-primary">{{ $element->name }}</span>
                            <div class="d-flex mt-2">
                                <form class="ms-2" action="{{ "/movies/moderation/".$element->id }}" method="post">
                                    @csrf <!-- {{ csrf_field() }} -->
                                    @method('post')
                                    <input name="id" type="hidden" value={{ $element->id }} />
                                    <button class="btn btn-success" type="submit">Одобрить</button>
                                </form>
                                <form class="ms-2" action="{{ "/movies/".$element->id }}" method="post">
                                    @csrf <!-- {{ csrf_field() }} -->
                                    @method('delete')
                                    <input name="id" type="hidden" value={{ $element->id }} />
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
@endsection
