@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create color</h1>
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
                <form action="{{ route('color.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Color name">
                    </div>
                    <div class="form-group">
                        <p>Note: type color hex <b>WITHOUT</b> "#"</p>
                        <input type="text" name="hex" class="form-control" placeholder="Color hex">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
