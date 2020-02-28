@extends('backendtemplate')

@section('content')

<div class="container-fluid">
	<!-- <h2>Create New Form</h2> -->
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="card-header py-3">
		<div class="row">
			<div class="col-10">
				<h4 class="m-0 font-weight-bold text-primary"> 
	            	Create New Course
	            </h4>
			</div>

			<div class="col-2">
				<a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-block float-right"> 
	        		<i class="fa fa-backward pr-2"></i>	Go Back 
	        	</a>
			</div>
		</div>

	</div>
<div class="row">
		<form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
				<div class="col-sm-10">
					<input type="file" class="file-control" name="logo" id="inputLogo">
				</div>
			</div>			
			<div class="form-group row">
				<label for="outline" class="col-sm-2 col-form-label">Outline</label>
				<div class="col-sm-10">
					<textarea type="text" class="form-control" name="outlines" id="outlines"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Fees</label>
				<div class="col-sm-10">
					<input type="number" name="fees" class="form-control" id="fees">
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">During</label>
				<div class="col-sm-10">
					<input type="text" name="during" class="form-control" id="during">
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Duration</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="duration" id="duration">
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