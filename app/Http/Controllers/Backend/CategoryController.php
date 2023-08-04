<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('Action', function($category) {
                        return view('backend.category.partials.category_table_action', ['category' => $category]);
                    })
                    ->rawColumns(['Action', 'created_date'])
                    ->make(true);
        }
        return view('backend.category.index');
    }

    public function create() : View
    {
        return view('backend.category.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);
        Category::create([
            'title' => $attributes['title'],
            'slug' => Str::slug($attributes['title'])
        ]);
        return redirect()->route('categories.index')->with(['create_status' => 'Category Successfully Created!']);
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category) : View
    {
        return view('backend.category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category) : RedirectResponse
    {
        $attributes = $request->validate([
            'title' => 'required'
        ]);
        $category->update([
            'title' => $attributes['title'],
            'slug' => Str::slug($attributes['title'])
        ]);
        return redirect()->route('categories.index')->with(['update_status' => 'Category Successfully Updated!']);
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return back()->with(['delete_status' => 'Category Successfully Deleted!']);
    }
}
