<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('published', true) !!}
    {!! Form::label('published', 'Published') !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published at:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

@section('footer')
<script>
    $('#tag_list').select2({
        'placeholder': 'Choose a tag'
    });
</script>
@stop
