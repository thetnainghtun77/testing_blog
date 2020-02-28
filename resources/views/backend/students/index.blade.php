@extends('backendtemplate')

@section('content')

	<div class="container-fluid">
		<h2>Show With Table</h2>
		<a href="{{route('students.create')}}" class="btn btn-info float-right">Add New</a>
		<div class="row">

			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Education</th>						
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach($students as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->namee}}</td>
							<td>{{$row->email}}</td>
							<td>{{$row->phone}}</td>
							<td>{{$row->education}}</td>
							<td>
								<a href="#" class="btn btn-info detail" data-id="{{$row->id}}">Detail</a>
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

<!-- Modal -->
<div class="modal" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.detail').click(function(){
			/*console.log('Hello');*/
			var id = $(this).data('id');
		

			$.get("students/"+id,function(res){
				//console.log(res);
				$('#detailModalLabel').text(res.namee);
				$('#detailModal').modal('show');
			})
		})
	})
</script>
@endsection