@extends('app')
@section('content')
    <h1>Write a new Article</h1>

    <hr/>
    <div class="container">
        {!! Form::open(['url' => 'articles']) !!}
            @include('articles/partials/form', ['submitButtonText' => 'Add Article'])
        {!! Form::close() !!}

        {{--Display errors--}}
        @include('errors/list')
    </div>
@stop
