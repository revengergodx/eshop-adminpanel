@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Color show</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Home</a></li>
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
{{--                            <div class="mr-3">--}}
{{--                                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Edit</a>--}}
{{--                            </div>--}}
                            <form action="{{ route('order.delete', $order->id) }}" method="post">
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
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <td>User First name</td>
                                    <td>{{ $order->users->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>User Last name</td>
                                    <td>{{ $order->users->last_name }}</td>
                                </tr>
                                <td>Products:</td>
                                <td>Total price: {{ $order->total_price }}</td>
                                <tr></tr>
                                <td>ID:</td>
                                <td>Title:</td>
                                <td>Price:</td>
                                <td>Quantity:</td>
                                <td>Color:</td>
                                <td>Size:</td>
                                <td>Total Price:</td>
{{--                                                                    @dd($order)--}}
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->color[0]->name }}
                                            <div
                                                style="width: 48px; height: 24px; background: {{ '#' . $product->color[0]->hex}}"></div>
                                        <td>{{ $product->size[0]->title }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
