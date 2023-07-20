@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" value="{{ $user->first_name ?? old('first_name')}}" name="first_name"
                               class="form-control" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $user->last_name ?? old('last_name')}}" name="last_name"
                               class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{ $user->age ?? old('age')}}" name="age" class="form-control"
                               placeholder="Age">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Gender</option>
                                <option {{ $user->gender == 1 || old('gender') == 1 ? 'selected' : '' }} value="1">
                                    Male
                                </option>
                                <option {{ $user->gender == 2 || old('gender') == 2 ? 'selected' : '' }} value="2">
                                    Female
                                </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ $user->address ?? old('address')}}" name="address"
                               class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
