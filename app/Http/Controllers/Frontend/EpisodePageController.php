<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodePageController extends Controller
{
    public function showEpisode(Course $course, Episode $episode) 
    {
        // dd(Str::afterLast(url()->current(), '/'));
        $episode_ids = Episode::all()->where('course_id', $course->id)->toBase()->pluck('id')->toArray();
        if(!in_array($episode->id, $episode_ids)) {
            abort(404);
        }
        return view('frontend.courses.episodes.episode', ['course' => $course]);
    }

    public function getVideo() {
        $video = Episode::where('id', request()->id)->first();
        return json_encode($video);
    }
}
