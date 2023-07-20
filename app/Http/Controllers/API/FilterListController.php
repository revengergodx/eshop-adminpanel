<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SizeResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\TagResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Tag;

class FilterListController extends Controller
{
    public function index()
    {
        $result = [
            'categories' => CategoryResource::collection(Category::all()),
            'colors' => ColorResource::collection(Color::all()),
            'sizes' => SizeResource::collection(Size::all()),
            'tags' => TagResource::collection(Tag::all()),
            'price' => [
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ],
        ];

        return $result;
    }

}
