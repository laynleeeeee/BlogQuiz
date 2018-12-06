@extends('layouts.app')

@section('content')

@if(count($errors))
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		{{$error}}<br>
		@endforeach
	</div>
	@endif
	
{!! Form::open()!!}
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', $blogs -> title, ['class' => 'form-control', 'placeholder' => 'ex. Blog title']) !!}

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', $blogs -> body, ['class' => 'form-control', 'placeholder' => 'ex. Blog body']) !!}
		{!!Form::select('category',['Tips' => 'Tips','Technology' => 'Technology','Health' => 'Health','Politics' => 'Politics','Review' => 'Review'], $blogs -> category ,['class' => 'form-control'])!!}
	</div>
	{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
	@stop