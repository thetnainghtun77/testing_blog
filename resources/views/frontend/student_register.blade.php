@extends('frontendtemplate')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- <h2>Show with Form</h2> -->


	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">
		<i class="fas fa-book"></i> 
		Student Create Form 
	</h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col-10">
					<h4 class="m-0 font-weight-bold text-primary"> 
						Student Information 
					</h4>
				</div>
			</div>

<div class="card-body">

@if (session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
@endif

<form action="{{ route('students.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate="" id="demo-form">
	@csrf

	<div class="form-group row">

		<div class="col-sm-6">
			<input type="text" class="form-control" id="fName" placeholder="Enter Name in English" name="fname" required="" autocomplete="fname" autofocus="">
			<br>
		</div>

		<div class="col-sm-6">
			<input type="text" class="form-control " id="sName" placeholder="Enter Name in Myanmar" name="sname" required="" autocomplete="sname" autofocus="">
			<br>
		</div>


		<!-- Second -->
		<div class="col-sm-6">
			<input type="text" class="form-control" id="education" placeholder="Enter Education" name="education" required="" autocomplete="education" autofocus=""><br>
		</div>

		<div class="col-sm-4">
			<input type="text" class="form-control " id="city" placeholder="Enter City" name="city" required="" autocomplete="city" autofocus=""><br>
		</div>

		<div class="col-sm-2">
			<input type="text" class="form-control " id="acceptedyear" placeholder="Accepted Year" name="acceptedyear" required="" autocomplete="acceptedyear" autofocus=""><br>
		</div>


		<!-- Third -->
		<textarea class="form-control summernote" name="address" placeholder="Enter Address" required="" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.." data-parsley-validation-threshold="10"></textarea>
<br>
		<!-- Forth -->
		<div class="col-sm-6">
			<br>
			<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required="" autocomplete="email" autofocus=""><br>
		</div>

		<div class="col-sm-6">
			<br>
			<input type="number" class="form-control " id="phone" placeholder="Enter Phone Number" name="phone" required="" autocomplete="phone" autofocus=""><br>
		</div>

		<!-- Firth -->
		<div class="col-sm-6">
			<input type="date" class="form-control " id="dob" placeholder="Enter Date of Birth" name="dob" required="" autocomplete="dob" autofocus=""><br>
		</div>

		<div class="form-group col-sm-6">
			Gender:<br>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female<br>
		</div><br><br>

		<!-- Six -->
		<div class="form-group">
			<h5>Which Programming Languages did you know?</h5>

		@foreach($subjects as $row)
		<input type="checkbox" name="subjects" value="{{$row->id}}">{{$row->name}}&nbsp; &nbsp;&nbsp;
		@endforeach
		<br>
		</div>
<hr style="background:rebeccapurple;width: 100%;">

		<!-- Seven -->
		<div class="col-sm-12">
			<h5>Household Parent/Guardian Information</h5>
		</div>

		<div class="col-sm-4">
			<input type="text" class="form-control " id="p1" placeholder="Parent/Guardian #1" name="p1" required="" autocomplete="p1" autofocus=""><br>
		</div>

		<div class="col-sm-4">
			<input type="text" class="form-control " id="r1" placeholder="Relationship of Student" name="r1" required="" autocomplete="r1" autofocus=""><br>
		</div>

		<div class="col-sm-4">
			<input type="number" class="form-control " id="ph1" placeholder="Phone" name="ph1" required="" autocomplete="ph1" autofocus=""><br>
		</div>

		<!-- Eight -->
		<div class="col-sm-12">
			<h5>Household Parent/Guardian Information</h5>
		</div>

		<div class="col-sm-4">
			<input type="text" class="form-control " id="p2" placeholder="Parent/Guardian #2" name="p2" required="" autocomplete="p2" autofocus=""><br>
		</div>

		<div class="col-sm-4">
			<input type="text" class="form-control " id="r2" placeholder="Relationship of Student" name="r2" required="" autocomplete="r2" autofocus=""><br>
		</div>

		<div class="col-sm-4">
			<input type="number" class="form-control " id="ph2" placeholder="Phone" name="ph2" required="" autocomplete="ph2" autofocus=""><br>
		</div>
<hr style="background:rebeccapurple;width: 100%;">

	<div class="col-sm-12">
		<h5>The reasons of chosing Myanmar IT Consulting</h5>
	</div>

	<textarea class="form-control summernote" name="because" placeholder="Please..." required="" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.." data-parsley-validation-threshold="10"></textarea>

	<div class="form-group row">
				<div class="col-sm-12">
					<br>
					<input type="hidden" name="bid" value="1">
					<button type="submit" class="btn btn-primary d-block">
						<i class="fa fa-save"></i> Save Register
					</button>
				</div>
			</div>

	</div>
</form>
</div>

@sectionend