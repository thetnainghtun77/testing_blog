@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="row">
		<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" id="name" value="{{$degree->name}}">
				</div>
			</div>
			<div class="form-group row col-sm-10">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>

@endsection