@extends('app')
@section('content')
    <h1>Write a new Article</h1>

    <hr/>
    {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
        @include('articles/partials/form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}

    {{--Display errors--}}
    @include('errors/list')
@stop
