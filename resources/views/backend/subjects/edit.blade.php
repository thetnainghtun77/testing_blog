@extends('backendtemplate')

@section('content')

<div class="container-fluid">
		<h2>Show with Form/ Old value</h2>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row">
			<form method="post" action="{{route('subjects.update',$subject->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input type="text" name="name" class="form-control" id="name" value="{{$subject->name}}">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
</div>

@endsection