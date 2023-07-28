<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() : View
    {
        $categories = Category::all();
        return view('backend.category.index', ['categories' => $categories]);
    }

    public function create() : View
    {
        return view('backend.category.create');
    }

    public function store(Request $request) : object
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);
        Category::create([
            'title' => $attributes['title'],
            'slug' => Str::slug($attributes['title'])
        ]);
        return redirect()->route('category.index')->with(['create_status' => 200]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category) : View
    {
        return view('backend.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category) : object
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);
        $category->update([
            'title' => $attributes['title'],
            'slug' => Str::slug($attributes['title'])
        ]);
        return redirect()->route('category.index')->with(['update_status' => 200]);
    }

    public function destroy(Category $category) : object
    {
        $category->delete();
        return back()->with(['delete_status' => 200]);
    }
}
