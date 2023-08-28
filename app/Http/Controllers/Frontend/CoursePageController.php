<?php

namespace App\Http\Controllers\Frontend;

use Embed\Embed;
use App\Models\Course;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VideoDurationService;
use Illuminate\Support\ViewErrorBag;

class CoursePageController extends Controller
{
    public function index() : View 
    {
        $courses = Course::take(6)->get();
        $categories = Category::all()->toBase()->pluck('title', 'slug')->toArray();
        return view('frontend.courses.courses', ['courses' => $courses, 'categories' => $categories]);
    }

    public function loadMore()
    {
        $courses = Course::with('Episode')->skip(request()->count)->take(6)->get();

        if(Course::count() == request()->count) {
            return 0;
        }
        return json_encode($courses);
    }

    public function search() 
    {
        $query = Course::query()->with('Episode');

        $courses =  $query->when(request()->search ?? false, function($q)  {
                        $q->where('title', 'like', '%'.request()->search.'%')
                            ->orWhereIn('id', function($qu) {
                                $qu->select('course_id')
                                    ->from('category_course')
                                    ->whereIn('category_id', function($qur) {
                                        $qur->select('id')
                                            ->from('categories')
                                            ->where('title', 'like', '%'.request()->search.'%');
                                    });
                            });
                    })->get();
        return json_encode($courses);
    }

    public function categorySearch()
    {
        $query = Course::query()->with('Episode');
        $courses =  $query->when(request()->search, function($query) {
            $query->whereIn('id', function($qu) {
                $qu->select('course_id')
                    ->from('category_course')
                    ->whereIn('category_id', function($qur) {
                        $qur->select('id')
                            ->from('categories')
                            ->where('title', 'like', '%'.request()->search.'%');
                    });
            });
        })->get();
        return json_encode($courses);
    }

    public function show(Course $course)
    {
        return view('frontend.courses.detail', ['course' => $course]);
    }
}
