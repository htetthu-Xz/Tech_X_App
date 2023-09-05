<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\Instructor;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index() : View 
    {
        $courses = Course::all();
        $categories = Category::take(8)->get()->toBase()->pluck('title', 'slug')->toArray();
        $instructors = Instructor::select('name', 'profile', 'Bio')->get()->toBase()->toArray();
        
        return view('frontend.home', ['courses' => $courses, 'categories' => $categories, 'instructors' => $instructors]);
    }

    public function load()
    {
        $categories = Category::skip(request()->count)->take(8)->get()->toBase()->toArray();
        $max_count = request()->count + 8;
        $result['data'] = $categories;

        if(Category::count() - $max_count <= 0) {
            $result['status'] = 0;
            return json_encode($result);
        }
        return json_encode($result);
    }
}
