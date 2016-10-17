@extends('app')
@section('content')
    <h1>{{$article->title}}</h1>
    <article>
        <p>{{$article->body}}</p>
    </article>
    @unless($article->getTags->isEmpty())
        <h4>Tags:</h4>
        <ul>
            @foreach($article->getTags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless
@stop
