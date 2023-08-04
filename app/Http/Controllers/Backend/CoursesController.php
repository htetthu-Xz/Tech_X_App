<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Courses;
use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $query = Courses::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('description', function($course) {
                        return Str::limit($course->description, 20);
                    })
                    ->addColumn('instructor', function($course) {
                        return $course->Instructor->name;
                    })
                    ->addColumn('Action', function($course) {
                        return view('backend.course.partials.course_table_action', ['course' => $course]);
                    })
                    ->rawColumns(['Action', 'created_date'])
                    ->make(true);
        }

        return view('backend.course.index');
    }
    public function create() : View
    {
        $instructors = Instructor::all();
        return view('backend.course.create', ['instructors' => $instructors]);
    }
    public function store(CoursesRequest $request) : RedirectResponse
    {
        Courses::create($request->validated());
        return redirect()->route('courses.index')->with(['create_status' => 'Course Successfully Created!']);
    }
    public function show($id)
    {
        //
    }
    public function edit(Courses $course)
    {
        $instructors = Instructor::all();
        return view('backend.course.edit', ['course' => $course, 'instructors' => $instructors]);
    }
    public function update(CoursesRequest $request, Courses $course)
    {
        $attributes = $request->validated(); 

        $course->update($attributes);
        
        return redirect()->route('courses.index')->with(['update_status' => 'Course Successfully Updated!']);
    }
    public function destroy(Courses $course)
    {
        $course->delete();
        return back()->with(['delete_status' => 'Course Successfully Deleted!']);
    }
}
