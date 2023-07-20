@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User create</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{old('first_name')}}" name="first_name" class="form-control" placeholder="First name*">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('last_name')}}" name="last_name" class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{old('age')}}" name="age" class="form-control" placeholder="Age">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Gender</option>
                            <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Male</option>
                            <option {{ old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('address')}}" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('email')}}" name="email" class="form-control" placeholder="Email*">
                        <p>This field is required</p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password*">
                        <p>This field is required</p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password*">
                    </div>
                    <div class="form-group">
                        <p>*-required fields</p>
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
