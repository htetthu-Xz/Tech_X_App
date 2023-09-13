<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use Illuminate\Http\RedirectResponse;

class EpisodeController extends Controller
{
    public function index($id)
    {
        if(request()->ajax()) {
            $query = Episode::Where('course_id', $id);
            
            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($episode) {
                        return Carbon::parse($episode->created_at)->format('d M, Y');
                    })
                    ->addColumn('course', function($episode) {
                        return $episode->Course->title;
                    })
                    ->addColumn('action', function($episode) {
                        return view('backend.course.episode.partials.episode_table_action', ['episode' => $episode]);
                    })
                    ->rawColumns(['action', 'course', 'created_date'])
                    ->make(true);
        }

        return view('backend.course.episode.index', ['id' => $id]);
    }

    public function create(Course $course) : View
    {
        return view('backend.course.episode.create', ['course' => $course]);
    }

    public function store(EpisodeRequest $request, $id) : RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['privacy'] = $this->modifyPrivacy($attributes);

        $attributes['cover'] = $this->setFile($request, 'cover', 'public/images/episode/');

        $attributes['image'] = $this->setFile($request, 'image', 'public/images/episode/');

        $attributes['video'] = $this->setFile($request, 'video', 'public/images/episode/video/');

        Episode::create($attributes);

        return redirect()->route('episodes.index', [$id])
                    ->with(['create_status' => 'Episode Successfully Created!']);
    }

    public function show(Course $course, Episode $episode) : View
    {
        return view('backend.course.episode.detail', ['episode' => $episode]);
    }

    public function edit(Course $course, Episode $episode) : View
    {
        return view('backend.course.episode.edit', ['episode' => $episode]);
    }

    public function update(EpisodeRequest $request, Course $course, Episode $episode) : RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['privacy'] = $this->modifyPrivacy($attributes);

        if($request->cover !== null) {
            $attributes['cover'] = $this->setFile($request, 'cover', 'public/images/episode/');
        }

        if($request->image !== null) {
            $attributes['image'] = $this->setFile($request, 'image', 'public/images/episode/');
        }

        if($request->video !== null) {
            $attributes['video'] = $this->setFile($request, 'video', 'public/images/episode/video/');
        }

        $episode->update($attributes);

        return redirect()->route('episodes.index', [$course->id])
            ->with(['update_status' => 'Episode Successfully Updated!']);
    }

    public function destroy(Course $course, Episode $episode) : RedirectResponse
    {
        $episode->delete();

        return redirect()->back()
                ->with(['delete_status' => 'Episode Successfully deleted!']);
    }
}
