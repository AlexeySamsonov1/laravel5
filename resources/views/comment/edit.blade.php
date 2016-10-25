@extends('app')
@section('content')
<h1>Edit the comment</h1>
{!! Form::model($comment, ['method' => 'PATCH', 'action' => ['CommentController@update', $comment]]) !!}
{{--$article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]--}}
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Update a comment', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
