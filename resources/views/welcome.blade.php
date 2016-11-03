
@extends('app')

@section('header')

    <title>Laravel &raquo; Home</title>

@endsection

@section('content')
	<br>
	<br>
	<br>
	<div class="carousel">
	@foreach($artikel as $key)
    <a class="carousel-item" href="#one!" style="height:400px;width:400px;"s"><img src="{{url('images/'.$key->sampul)}}"></a>
    @endforeach
  	</div>
	<center>
    <h1>Welcome To vias.blog</h1>
	<h4>Full Article Innovations And Creations</h4>
	</center>



@endsection

@section('footer')
<script>
$(document).ready(function(){
	$('.carousel').carousel();
});
</script>

@endsection
