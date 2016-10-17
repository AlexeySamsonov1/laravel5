@extends('app')
@section('content')
    <h1>List of articles:</h1>
    @foreach($articles as $article)
        <a href="{{url('articles/' . $article->id)}}"><h3>{{$article->title}}</h3></a>
    @endforeach
@stop
