@extends('layouts.app')

@section('content')
    <h1>Новая статья</h1>
    {{ Form::model($article, ['route' => 'articles.store']) }}
        @include('article.form')
        {{ Form::submit('Сохранить') }}
    {{ Form::close() }}
@endsection
