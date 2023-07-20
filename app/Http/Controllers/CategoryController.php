<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['category_image'] = Storage::disk('public')->put('/images/categories', $data['category_image']);
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($data->hasFile('category_image')) {
            $data['category_image'] = Storage::disk('public')->put('/images/categories', $data['preview_image']);
        }
        $category->update($data);
        return redirect()->route('category.show', compact('category'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
