@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<h2>Create New Form</h2>
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
		<form method="post" action="{{route('degrees.store')}}">
			@csrf
			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="name">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection