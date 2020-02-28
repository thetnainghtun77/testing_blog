@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="row">
		<form method="post" action="{{route('trainers.store')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" id="email">
				</div>
			</div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">Phone</label>
				<div class="col-sm-10">
					<input type="text" name="phone" class="form-control" id="phone">
				</div>
			</div>
			<div class="form-group row">
				<label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
				<div class="col-sm-10">
					<input type="file" class="file-control" name="avatar" id="avatar">
				</div>
			</div>			
			<div class="form-group row">
				<label for="address" class="col-sm-2 col-form-label">Address</label>
				<div class="col-sm-10">
					<textarea type="text" class="form-control" name="address" id="address"></textarea>
				</div>
			</div>			
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Choose Degree</label>

				<div class="col-sm-10">
					<select name="degree" id="degree" class="form-control">
						<option value="">Select Degree</option>
						@foreach($degrees as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
				</div>

			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Choose Course</label>
				<div class="col-sm-10">
					<select name="course" id="course" class="form-control">
						<option value="">Select Course</option>
						@foreach($courses as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach
					</select>
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