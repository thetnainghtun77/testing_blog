@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<h2>Degree Table</h2>
	<div class="row col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>No</th>
				<th>Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				@php $i=1; @endphp
				@foreach($degrees as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->name}}</td>
					<td>
						<a href="{{route('degrees.edit',$row->id)}}" class="btn btn-warning">Edit</a>

						<form method="post" class="d-inline-block" action="{{route('degrees.destroy',$row->id)}}"
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