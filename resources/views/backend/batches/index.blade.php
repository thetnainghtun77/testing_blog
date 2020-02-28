@extends('backendtemplate')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
         
          <br>

          @if($message= Session::get('success'))
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success" >
              <p>{{$message }}</p>
            </div>
            </div>
          </div>
            
          @endif
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Batches</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                  <div class="col-10">
                    <h4 class="m-0 font-weight-bold text-primary"> 
                            List 
                          </h4>
                  </div>

                  <div class="col-2">
                    <a href="{{ route('batches.create') }}" class="btn btn-outline-primary btn-block float-right"> 
                            <i class="fa fa-plus pr-2"></i> Add New 
                          </a>
                  </div>
                </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Time</th>
                      <th>Course</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Title</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Time</th>
                      <th>Course</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @php $i=1; @endphp
                  @foreach($batches as $row)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$row->title}}</td>
                      <td>{{$row->startdate}}</td>
                      <td>{{$row->enddate}}</td>
                      <td>{{$row->time}}</td>
                      <td>{{$row->course->name}}</td>
                      <!-- <td>

                        @foreach($courses as $c)
                        @php
                        $cid= $c->id;
                        $bcid=$row->course_id;
                        @endphp
                          @if($cid==$bcid)
                             {{$c->name}}
                          @endif
                        @endforeach
                      </td> -->
                      
                      <td>
                        <a href="{{route('batches.show', $row->id)}}"  class="btn btn-outline-info float-left">
                          <i class="fas fa-info"></i>
                        </a>
                        <a href="{{route('batches.edit',$row->id)}}" class="btn btn-outline-warning float-left">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{route('batches.destroy',$row->id)}}"
                           onsubmit="return confirm('Are you sure?')" class="float-left">
                          @csrf
                          @method('DELETE')
                          <button type="submit "class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                        
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


@endsection