@extends('index')
@section('title', 'Home Page')




@section('content')
<div class="container-fluid">
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Iamge Crud</h3>
          
        </div>
        <!-- /.card-header -->
       {{-- / @if(session()->get('user')) --}}
         {{-- {{ session()->all() }} --}}
{{-- @php
 $user= session()->get('user');
 print_r($user->name);
@endphp --}}
        {{-- @endif --}}
        <div class="card-body">
          <table class="table table-bordered" style="width: 100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($crud as $cr )    
          <tr>
                <td>{{ $cr->id }}</td>
                <td>{{ $cr->name }}</td>
                <td><img src="images/{{ $cr->img_path}}" alt="wrong" width="200" height="150"></td>
                <td>
                  <a href="{{ route('getImage',['id'=>$cr->id]) }}">Edit</a>
                 <a href="{{ route('deleteImage',['id'=>$cr->id]) }}">Delete</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      
      </div>
     
    </div>
   
    <!-- /.col -->
  </div>
  <!-- /.row -->
  
          <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection