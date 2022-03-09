@extends('index')
@push('css')
  
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
@endpush
@section('title', 'Edit user')


@section('content')
<div class="container-fluid">
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('home') }}" class="btn btn-warning">back</a>
          <h3 class="card-title">Edit User</h3>
        </div>
        {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('editUser') }}" method="POST">
         @method('put')
        @csrf
         <div class="form-group row">
           <input type="hidden" name="id" value="{{ $user->id }}">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="your Name" value="{{$user->name}}">
            @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail3"  value="{{$user->email }}">
            
            @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
          </div>
        </div>
        
        <div class="form-group row">

          <label for="gender" class="col-sm-2 col-form-label">Geneder</label>
          <div class="custom-control custom-radio">
            <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="male" name="gender" value="male" @if ( $user->gender=='male') @checked(true)
              
            @endif  >
            <label for="male" class="custom-control-label mr-2">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="female" name="gender" value="female" @if ( $user->gender=="female") @checked(true)
              
            @endif >
            <label for="female" class="custom-control-label">Female</label>
          </div>
          
        </div>
        
          <button type="submit" class="btn btn-primary">update</button>
          
        </form>
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

@push('scripts')
    
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

@endpush