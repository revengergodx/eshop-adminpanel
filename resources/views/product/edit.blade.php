@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product edit</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <p>Title* : </p>
                        <input type="text" value="{{ $product->title }}" name="title" class="form-control"
                               placeholder="Title*">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Description* : </p>
                        <input type="text" value="{{ $product->description }}" name="description" class="form-control"
                               placeholder="Description*">
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Content* : </p>
                        <textarea name="content" class="form-control" placeholder="Content*" cols="30"
                                  rows="10">{{ $product->content }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Price* : </p>
                        <input type="text" value="{{ $product->price }}" name="price" class="form-control"
                               placeholder="Price*">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Count* : </p>
                        <input type="text" value="{{ $product->count }}" name="count" class="form-control"
                               placeholder="Count*">
                        @error('count')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Image :</p>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Category: </p>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @if(isset($product->categories))
                            <p>Current Category : <b>{{ $product->categories->title }} </b></p>
                        @endif
                    </div>
                    <div class="form-group">
                        <p>Tags: </p>
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select Tags"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    value="{{$tag->id}}" @selected(in_array($tag->id, $product->tags->pluck('id')->toArray()))>{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <p>Colors: </p>
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select Colors"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option
                                    value="{{$color->id}}" @selected(in_array($color->id, $product->colors->pluck('id')->toArray()))>{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="sizes[]" class="sizes" multiple="multiple" data-placeholder="Select Sizes"
                                style="width: 100%;">
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}" @selected(in_array($size->id, $product->sizes->pluck('id')->toArray()))>{{$size->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p>*-required fields</p>
                    <input type="submit" class="btn btn-primary" value="Send">
                </form>
                <label>Image:</label>
                <img src="{{ url('storage/' . $product->preview_image) }} " class="img-responsive mb-4"
                     style="max-height:250px; max-width:250px" alt="{{ 'preview_image' }}">
            </div>
        </div>
    </section>
@endsection
