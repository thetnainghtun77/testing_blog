@extends('backendtemplate')

@section('content')

	<div class="container-fluid">
		<h2>Show With Table</h2>
		<!-- <a href="{{route('courses.create')}}" class="btn btn-info float-right">Add New</a>
		<div class="row"> -->
			<div class="card-header py-3">
                <div class="row">
                  <div class="col-10">
                    <h4 class="m-0 font-weight-bold text-primary"> 
                            List 
                          </h4>
                  </div>

                  <div class="col-2">
                    <a href="{{ route('courses.create') }}" class="btn btn-outline-primary btn-block float-right"> 
                            <i class="fa fa-plus pr-2"></i> Add New 
                          </a>
                  </div>
                </div>
            </div>

			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Fees</th>
							<th>During</th>
							<th>Duration</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach($courses as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->name}}</td>
							<td>{{$row->fees}}</td>
							<td>{{$row->during}}</td>
							<td>{{$row->duration}}</td>
							<td>
								<a href="{{route('courses.show',$row->id)}}" class="btn btn-info">Detail</a>
								<a href="{{route('courses.edit',$row->id)}}" class="btn btn-warning">Edit</a>

								<form method="post" class="d-inline-block" action="{{route('courses.destroy',$row->id)}}"
								onsubmit="return confirm('Are your sure??')">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>
								<!-- <a href="" class="btn btn-danger">Delete</a> -->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	

@endsection