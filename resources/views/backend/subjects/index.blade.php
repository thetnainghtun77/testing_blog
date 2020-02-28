@extends('backendtemplate')

@section('content')

	<div class="container-fluid">
		<h2>Subject Table</h2>
		<div class="row col-md-12">
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
						@foreach($subjects as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->name}}</td>						
							<td>								
								<a href="{{route('subjects.edit',$row->id)}}" class="btn btn-warning">Edit</a>

								<form method="post" class="d-inline-block" action="{{route('subjects.destroy',$row->id)}}"
								onsubmit="return confirm('Are your sure??')">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Delete</button>
								</form>								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>

@endsection