<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CoursesController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $query = Course::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($course) {
                        return Carbon::parse($course->created_at)->format('d M, Y');
                    })
                    ->addColumn('description', function($course) {
                        return Str::limit($course->description, 20);
                    })
                    ->addColumn('instructor', function($course) {
                        return $course->Instructor->name;
                    })
                    ->addColumn('action', function($course) {
                        return view('backend.course.partials.course_table_action', ['course' => $course]);
                    })
                    ->rawColumns(['action', 'created_date'])
                    ->make(true);
        }

        return view('backend.course.index');
    }

    public function create() : View
    {
        $instructors = Instructor::all()->toBase()->pluck('name', 'id')->toArray();
        $categories = Category::all()->toBase()->pluck('title', 'id')->toArray();

        return view('backend.course.create', ['instructors' => $instructors, 'categories' => $categories]);
    }

    public function store(CoursesRequest $request) : RedirectResponse
    {
        $attributes = $request->validated();
        
        $categories = $attributes['category_id'];

        unset($attributes['category_id']);

        $attributes['slug'] = Str::slug($attributes['title']);

        if($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid()) {
            $file_name = uploadImage($request->file('cover_photo'), 'public/images/course/');
            $attributes['cover_photo'] = $file_name;
        }

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = uploadImage($request->file('image'), 'public/images/course/');
            $attributes['image'] = $file_name;
        }

        $courses = Course::create($attributes);

        $courses->Category()->attach($categories);

        return redirect()->route('courses.index')->with(['create_status' => 'Course Successfully Created!']);
    }

    public function show(Course $course) : View
    {
        return view('backend.course.detail', ['course' => $course]);
    }

    public function edit(Course $course)
    {
        $instructors = Instructor::all();

        $categories = Category::all()->toBase()->pluck('title', 'id')->toArray();

        $course_category_id = $course->Category->toBase()->pluck('title', 'id')->toArray();

        return view('backend.course.edit', [ 'course_category_id' => $course_category_id, 'course' => $course, 'instructors' => $instructors, 'categories' => $categories]);
    }

    public function update(CoursesRequest $request, Course $course)
    {
        $attributes = $request->validated(); 

        $categories = $attributes['category_id'];

        unset($attributes['category_id']);

        $attributes['slug'] = Str::slug($attributes['title']);

        if($request->hasFile('cover_photo') && $request->file('cover_photo')->isValid()) {
            $file_name = uploadImage($request->file('cover_photo'), 'public/images/course/');
            $attributes['cover_photo'] = $file_name;
        }

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = uploadImage($request->file('image'), 'public/images/course/');
            $attributes['image'] = $file_name;
        }

        $course->update($attributes);

        $course->Category()->sync($categories);
        
        return redirect()->route('courses.index')->with(['update_status' => 'Course Successfully Updated!']);
    }
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with(['delete_status' => 'Course Successfully Deleted!']);
    }
}
