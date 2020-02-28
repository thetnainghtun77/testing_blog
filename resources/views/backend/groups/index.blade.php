@extends('backendtemplate')

@section('content')

	<div class="container-fluid">
		<h2>Show With Table</h2>
		<a href="{{route('groups.create')}}" class="btn btn-info float-right">Add New</a>
		<div class="row">

			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach($groups as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->name}}</td>							
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