<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursePageController extends Controller
{
    public function index() : View 
    {
        $courses = Course::take(6)->get();
        // dd(Course::count());
        return view('frontend.courses.courses', ['courses' => $courses]);
    }

    public function loadMore()
    {
        $courses = Course::skip(request()->count)->take(6)->get();

        if(Course::count() == request()->count) {
            return 0;
        }
        return json_encode($courses);
    }
}
