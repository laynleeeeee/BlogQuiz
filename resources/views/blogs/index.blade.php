@extends('layouts.app')

@section('content')

<h2>Blogs</h2>
 <button type="button" class="btn btn-success" onclick="window.location='{{ url("blogs/create")}}'" style="width: 100%" >Create blog</button>
<hr>
	@foreach($blogs as $blog)
	<article>
		<h3><a href="{{url('blogs/show/'.$blog->id)}}">{{$blog->title}}</a></h3>
		<p>{{$blog->body}}</p>
		<a href="{{ url('blogs/category/'.$blog->category)}}"><b>{{$blog->category}}</b></a>
		<!-- <p>{{$blog->category}}</p> -->
		<p>{{$blog->created_at->diffForHumans()}}</p>
	</article>

	@endforeach

@stop 