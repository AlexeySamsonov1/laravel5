@extends('app')

@section('content')
    <h1>Edit: {{$article->title}}</h1>

    <div class="container">
        {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]) !!}
            @include('articles/partials/form', ['submitButtonText' => 'Update Article'])
        {!! Form::close() !!}

        {{--Display errors--}}
        @include('errors/list')
    </div>
@stop
