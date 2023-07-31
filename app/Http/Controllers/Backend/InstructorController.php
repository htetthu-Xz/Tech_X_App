<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;

class InstructorController extends Controller
{
    public function index() : View
    {
        $instructors = Instructor::all();
        return view('backend.instructor.index', ['instructors' => $instructors]);
    }

    public function create() : View
    {
        return view('backend.instructor.create');
    }

    public function store(InstructorRequest $request) : object
    {
        Instructor::create($request->validated());
        return redirect()->route('instructor.index')->with(['create_status' => 200]);
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
        return redirect()->route('instructor.index')->with(['update_status' => 200]);
    }

    public function destroy(Instructor $instructor) : object
    {
        $instructor->delete();
        return back()->with(['delete_status' => 200]);
    }
}
