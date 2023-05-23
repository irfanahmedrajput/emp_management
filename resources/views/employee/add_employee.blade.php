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
               <h1>Add employee</h1>
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
       <form action="{{route('employee.store')}}" method="post" >
        @csrf
          <div class="form-group">
                <label for="email">Employee First Name:</label>
                <input type="text" name="first_name" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="email">Employee Last Name:</label>
                <input type="text" name="last_name" class="form-control" id="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Phone:</label>
                <input type="number" class="form-control" id="pwd" name="phone_number">
            </div>
            <div class="form-group">
                <select name="company_id">
                    @foreach($companies as $key => $value)

                    <option value="{{$value->id}}" >
                    {{$value->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
    </form>
       
    </div>


    <a href="{{route('home')}}">Back to Home</a>
@endsection