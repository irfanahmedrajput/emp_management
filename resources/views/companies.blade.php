@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                {{ __('You are logged in!') }} 
                            </p>
                        </div>
                    </div>
                </div>
               <h1>Add Company</h1>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
       
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- /.content -->
    <div class="content">
       <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
                <label for="email">Enter Company Name:</label>
                <input type="text" name="name" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="email"> Enter Email:</label>
                <input type="text" name="email" class="form-control" id="last_name">
            </div>
        
            <div class="form-group">
                <label for="logo">Upload logo:</label>
                <input type="file" class="form-control" id="file" name="logo">
            </div>
          
            <button type="submit" class="btn btn-default">Submit</button>
    </form>
       
    </div>


    <a href="{{route('home')}}">Back to Home</a>
@endsection