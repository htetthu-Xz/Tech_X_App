<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;

class InstructorController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            $query = Instructor::query();

            return DataTables::of($query)
                    ->addColumn('Name(Email)', function ($instructor) {
                        return view('backend.instructor.partials.instructor_table_name_row', ['instructor' => $instructor]);
                    })
                    ->addColumn('Action', function($instructor) {
                        return view('backend.instructor.partials.instructor_table_action', ['instructor' => $instructor]);
                    })
                    ->rawColumns(['Name(Email)', 'Action'])
                    ->make(true);
        }
        return view('backend.instructor.index');
    }

    public function create() : View
    {
        return view('backend.instructor.create');
    }

    public function store(InstructorRequest $request) : object
    {
        Instructor::create($request->validated());
        return redirect()->route('instructors.index')->with(['create_status' => 'Instructor Successfully Created!']);
    }

    public function show($id)
    {
        //
    }

    public function edit(Instructor $instructor) : View
    {
        return view('backend.instructor.edit', ['instructor' => $instructor]);
    }

    public function update(InstructorRequest $request, Instructor $instructor) : object
    {
        $attributes = $request->validated();

        if($attributes['password'] == null) {
            unset($attributes['password']);
        }

        $instructor->update($attributes);
        return redirect()->route('instructors.index')->with(['update_status' => 'Instructor Successfully Updated!']);
    }

    public function destroy(Instructor $instructor) : object
    {
        $instructor->delete();
        return back()->with(['delete_status' => 'Instructor Successfully Deleted!']);
    }
}
