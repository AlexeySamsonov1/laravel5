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
    <div class="comments-block">
        @unless($article->getComments->isEmpty())
            <h4>Comments:</h4>
            <ul class="list-group">
                @foreach($article->getComments as $comment)
                    <li class="list-group-item">
                        {{ $comment->body }}
                        <a href="#" class="comments-author pull-right"> {{ $comment->getUser->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endunless
    </div>
    <hr>
    {{--<a href="{{ route('comment.create', $article) }}">Add a comment</a>--}}
    @include('comment.create')
    <hr>
@stop
