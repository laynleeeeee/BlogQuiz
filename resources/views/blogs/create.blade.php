@extends('layouts.app')

@section('content')

	<!-- {!! Form::text('name','value',['class'=>'form-control']) !!} -->
	@if(count($errors))
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
		{{$error}}<br>
		@endforeach
	</div>
	@endif
	{!! Form::open(['url' => 'blogs']) !!}
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'ex. Blog title']) !!}

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'ex. Blog body']) !!}
		{!!Form::select('category',['Tips' => 'Tips','Technology' => 'Technology','Health' => 'Health','Politics' => 'Politics','Review' => 'Review'],'' ,['class' => 'form-control'])!!}
	</div>


	{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
@stop 