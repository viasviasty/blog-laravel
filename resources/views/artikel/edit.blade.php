@extends('app')

@section('header')
<title>Laravel &raquo; Artikel &raquo; Edit</title>
@endsection

@section('content')

<div class="row">
	<br>
	<form class="col s12" method="POST"
		action="{{url('artikel/update')}}"
		enctype="multipart/form-data">
		<div class="input-field col s12">
		<input id="judul" type="text" 
		class="validate" name="judul"
		value="{{$artikel->judul}}">
		<label for="judul">Title</label>
		</div>
		<div class="input-field col s12">
		<textarea id="isi" type="text"
		class="materialize-textarea"
		name="isi">{{$artikel->isi}}</textarea>
		<label for="isi">Content</label>
		</div>
		<tr>
			<td>Sampul</td>
			<br>
					<center>
					<td>
					<div class="image-container bordered">
                            <div class="frame">
                            	<img id="img" src="{{ url('images/'.$artikel->sampul) }}" 
                            	style="max-width:300px;">
                            </div>
                     </center>
                        </div>
                        <div class="file-field input-field col s12">
      		<div class="btn">
        		<span>Edit Image</span>
        			<input name="sampul" id="sampul" type="file">
      		</div>
      		<div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </tr>
		<div class="right">
			<button type="submit"
				class="btn">Save</button>
				</div>
				<input type="hidden" name="_token"
					value="{{csrf_token()}}">
					<input type="hidden" name="id"
					value="{{$artikel->id}}">
					</form>
					</div>
					@endsection
@section('footer')

<script type="text/javascript">
	
	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#sampul").change(function(){
    readURL(this);
});
</script>
@endsection