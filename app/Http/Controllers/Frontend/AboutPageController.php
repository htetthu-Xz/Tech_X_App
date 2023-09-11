<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index() : View 
    {
        $instructors = Instructor::select('name', 'profile', 'Bio')->get()->toBase()->toArray();

        return view('frontend.about', ['instructors' => $instructors]);    
    }
}
