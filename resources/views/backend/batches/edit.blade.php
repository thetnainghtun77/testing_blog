@extends('backendtemplate')

@section('content')

<!-- Begin Page Content -->
	<div class="container-fluid">
	  <!-- Page Heading -->
	  	<h1 class="h3 mb-4 text-gray-800">
	  		<i class="fas fa-tag pr-3"></i> 
	  		Batches
	  	</h1>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="row">
					<div class="col-10">
						<h4 class="m-0 font-weight-bold text-primary"> 
			            	Edit Batch Form
			            </h4>
					</div>

					<div class="col-2">
						<a href="{{ route('batches.index') }}" class="btn btn-outline-primary btn-block float-right"> 
		            		<i class="fa fa-backward pr-2"></i>	Go Back 
		            	</a>
					</div>
				</div>

	        </div>
	        <div class="card-body">
	        	@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				 @endif
				
	            <form action="{{ route('batches.update', $batch->id) }}" method="POST" enctype="multipart/form-data">
	            	@csrf

					<div class="form-group row">
						<label for="batchTitle" class="col-sm-2 col-form-label"> Title </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="batchTitle" placeholder="Enter Batch Title" name="title" value="{{$batch->id}}">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="startDate" class="col-sm-2 col-form-label"> Start Date </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="date" class="form-control" id="startDate"  name="startdate" value="{{$batch->startdate}}">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="endDate" class="col-sm-2 col-form-label"> End Date </label>
				    	
				    	<div class="col-sm-10">
				      		<input type="date" class="form-control" id="enctype" name="enddate" value="{{$batch->enddate}}">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="courseDuring" class="col-sm-2 col-form-label"> Time </label>  	
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" id="courseDuring" placeholder="Enter  Time" name="time" value="{{$batch->time}}">
				    	</div>
					</div>

					<div class="form-group row">
						<label for="course" class="col-sm-2 col-form-label"> Choose Course </label>
				    	
				    	<div class="col-sm-10">
				      		<select name="course_id" class="form-control" id="course">
				      			@foreach($courses as $row)
				      			<option value="{{$row->id}}" @if($batch->course_id == $row->id) {{'selected'}} @endif>{{$row->name}}
				      			</option>
				      			@endforeach
				      		</select>
				    	</div>
					</div>



					<div class="form-group row">
						<div class="col-sm-2"></div>
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">
					      	<i class="fa fa-save"></i> Save
					      </button>
					    </div>
					</div>

				</form>
				

	        </div>
		</div>

	</div>
<!-- /.container-fluid -->

@endsection