<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isNull;

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

    public function store(InstructorRequest $request) : RedirectResponse
    {
        $attributes = $request->validated();

        if(!is_null($attributes['link'][0]['icon'])) {
            $attributes['link'] = json_encode($attributes['link']);
        }

        Instructor::create($attributes);
        return redirect()->route('instructors.index')->with(['create_status' => 'Instructor Successfully Created!']);
    }

    public function show($id)
    {
        //
    }

    public function edit(Instructor $instructor) : View
    {
        //dd(json_decode($instructor->link, true));
        // foreach (json_decode($instructor->link, true) as $key => $item) {
        //     dd($key,$item);
        // }
        return view('backend.instructor.edit', ['instructor' => $instructor]);
    }

    public function update(InstructorRequest $request, Instructor $instructor) : RedirectResponse
    {
        $attributes = $request->validated();

        if($attributes['password'] == null) {
            unset($attributes['password']);
        }
        
        if(!is_null($attributes['link'][0]['icon'])) {
            $attributes['link'] = json_encode($attributes['link']);
        }

        $instructor->update($attributes);
        return redirect()->route('instructors.index')->with(['update_status' => 'Instructor Successfully Updated!']);
    }

    public function destroy(Instructor $instructor) : RedirectResponse
    {
        $instructor->delete();
        return back()->with(['delete_status' => 'Instructor Successfully Deleted!']);
    }
}
