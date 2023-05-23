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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Add employee</h1>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('employee.update', $employee)}}" method="post" class="needs-validation" novalidate>
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="first_name">Employee First Name:</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{$employee->first_name}}" required>
                                    <div class="invalid-feedback">Please provide a first name.</div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Employee Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{$employee->last_name}}" required>
                                    <div class="invalid-feedback">Please provide a last name.</div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}" required>
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone:</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$employee->phone_number}}" required>
                                    <div class="invalid-feedback">Please provide a phone number.</div>
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company:</label>
                                    <select name="company_id" class="form-control" required>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{$company->id === $employee->company->id ? 'selected':''}}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a company.</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <a href="{{route('home')}}" class="btn btn-secondary">Back to Home</a>
@endsection
