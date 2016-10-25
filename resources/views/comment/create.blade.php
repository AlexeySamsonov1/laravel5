<h2>Add a comment</h2>

{{--{!! Form::open(['route' => ['comment.store'],  'method' => 'post']) !!}--}}
{!! Form::open(['method' => 'POST', 'action' => ['CommentController@store', $article]]) !!}
{{--$article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]--}}
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Add a comment', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

