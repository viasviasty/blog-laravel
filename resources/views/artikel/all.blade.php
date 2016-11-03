@extends('app')

@section('header')

	<title>Laravel &raquo; Artikel &raquo; All</title>

	@endsection

	@section('content')

	<br>
	<a class="waves-effect waves-light btn right"
		href="{{url('artikel/add')}}">Add New</a>

		<br>
		<br>
		<br>

		<table>
			<thread>
				<tr>
					<th>Title</th>
					<th>Content</th>
					<th>Author</th>
					<th>Created At</th>
					<th colspan="2">Action</th>
					</tr>

				</thread>
				<tbody>
					@foreach($artikel as $key)
					<tr>
						<td>{{$key->judul}}</td>
						<td>{{$key->isi}}</td>
						<td>{{$key->id_user}}</td>
						<td>{{$key->created_at}}</td>
						<td><a href="{{url('artikel/edit/'.$key->id)}}">
						Edit
						</a>
						</td>
						<td><a href="{{url('artikel/delete/'.$key->id)}}"
						onclick="return confirm('Are you sure to delete {{$key->judul}}?')">
						Delete
						</a>
						</tr>
						@endforeach
						@if(sizeof($artikel)==0)
						<tr>
						<td colspan="6" class="center">
							<div>No Data</div>
							<div><a href="{{url('artikel/add')}}"
							class="waves-effect waves-light btn">Add New</a></div></td></tr>

							@endif

				</tbody>
				</table>

				@endsection