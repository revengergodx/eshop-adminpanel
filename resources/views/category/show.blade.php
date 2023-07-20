@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category show</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Home</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="mr-3">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('category.delete', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>id</td>
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <td>category</td>
                                    <td>{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><img src=" {{ url('storage/' . $category->category_image) }}" class="img-responsive mb-4"
                                             style="max-height:250px; max-width:250px" alt="{{ 'category_image' }}"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
