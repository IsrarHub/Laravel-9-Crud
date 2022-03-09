@extends('index')
@section('title', 'Home Page')




@section('content')
<div class="container-fluid">
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User List</h3>
          <a href="{{ route('adduser') }}" class=" btn btn-primary ml-3">Add new User</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($crud as $cr )    
          <tr>
                <td>{{ $cr->id }}</td>
                <td>{{ $cr->name }}</td>
                <td>{{ $cr->email }}</td>
                <td>{{ $cr->gender }}</td>
                <td>
                  <a href="{{ route('getUser',['id'=>$cr->id]) }}">Edit</a>
                 <a href="{{ route('deleteUser',['id'=>$cr->id]) }}">Delete</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
     
    </div>
   
    <!-- /.col -->
  </div>
  <!-- /.row -->
  
          <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection