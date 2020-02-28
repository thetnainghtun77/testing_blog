@extends('backendtemplate')
@section('content')

	<div class="container-fluid">
		<h2>Show with your own UI</h2>
		<div class="row">
			<div class="col-md-12">
				Name : {{$batch->title}}
				<br>
				Outlines : {{$batch->startdate}}
			</div>
		</div>
	</div>


@endsection