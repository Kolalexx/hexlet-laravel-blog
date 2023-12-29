@extends('layouts.app')

@section('content')
    @if (Session::has('errors'))
	    {{ Session::get('errors') }}
    @endif
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>
            <a href="{{ route('articles.show', $article->id) }}">{{$article->name}}</a>
        </h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        </h4>
            <a href="{{ route('articles.edit', $article) }}">Редактировать статью</a>
        </h4>
        <a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    @endforeach
    {{ $articles->links() }}
    <h2>
        <a href="{{ route('articles.create') }}">Добавить новую статью</a>
    </h2>
@endsection
