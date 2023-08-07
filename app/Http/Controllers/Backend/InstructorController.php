<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use function PHPUnit\Framework\isNull;

use App\Http\Requests\InstructorRequest;
use Illuminate\Support\Facades\Redirect;

class InstructorController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            $query = Instructor::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('name_email', function ($instructor) {
                        return view('backend.instructor.partials.instructor_table_name_row', ['instructor' => $instructor]);
                    })
                    ->addColumn('action', function($instructor) {
                        return view('backend.instructor.partials.instructor_table_action', ['instructor' => $instructor]);
                    })
                    ->rawColumns(['name_email', 'action', 'created_date'])
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

    public function show(Instructor $instructor)
    {
        return view('backend.instructor.detail', ['instructor' => $instructor]);
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
