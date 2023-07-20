@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product show</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Home</a></li>
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
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
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
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>Count</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><img src=" {{ url('storage/' . $product->preview_image) }}" class="img-responsive mb-4"
                                             style="max-height:250px; max-width:250px" alt="{{ 'preview_image' }}"></td>
                                </tr>
                                </tr>
                                @if(isset($product->categories))
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $product->categories->title }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Tags</td>
                                    @foreach($product->tags as $tag)
                                    <td>{{ $tag->title }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Colors</td>
                                    @foreach($product->colors as $color)
                                    <td>{{ $color->name }}<div style="width: 48px; height: 24px; background: {{ '#' . $color->hex}}"></div></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>Sizes</td>
                                    @foreach($product->sizes as $size)
                                    <td>{{ $size->title }}</td>
                                    @endforeach
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
