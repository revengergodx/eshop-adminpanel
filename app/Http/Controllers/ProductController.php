<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $sizes = Size::all();
        return view('product.create', compact('colors', 'tags', 'categories', 'sizes'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
//        $file = $request->file('preview_image');
//        $data['preview_image'] = $file->hashName();
//        $file->move(\public_path('/images'), $data['preview_image']);
        if (isset($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
        };
        if (isset($data['colors'])) {
            $colorIds = $data['colors'];
            unset($data['colors']);
        };
        if (isset($data['sizes'])) {
            $sizeIds = $data['sizes'];
            unset($data['sizes']);
        };

        $products = Product::firstOrCreate($data);
        $products->tags()->attach($tagIds);
        $products->colors()->attach($colorIds);
        $products->sizes()->attach($sizeIds);

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $sizes = Size::all();

        return view('product.edit', compact('product', 'colors', 'tags', 'categories', 'sizes'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        if (isset($data['tags'])) {
            $tagIds = $data['tags'];
            unset($data['tags']);
            $product->tags()->sync($tagIds);
        };
        if (isset($data['colors'])) {
            $colorIds = $data['colors'];
            unset($data['colors']);
            $product->colors()->sync($colorIds);

        };
        if (isset($data['sizes'])) {
            $sizeIds = $data['sizes'];
            unset($data['sizes']);
            $product->sizes()->sync($sizeIds);

        };
        $product->update($data);
        return redirect()->route('product.show', compact('product'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

}
