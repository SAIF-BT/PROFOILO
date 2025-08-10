<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Message;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {
        $skillCount = Skill::count();
        $educationCount = Education::count();
        $experienceCount = Experience::count();
        $serviceCount = Service::count();
        $projectsCount = Project::count();
        $testimonialCount = Testimonial::count();
        $messagesCount = Message::count();
        $usersCount = User::count();
        $testimonials = Testimonial::orderBy('created_at','DESC')->take(5)->get();
        $skills =Skill::orderBy('id','DESC')->get();
        $projects =Project::orderBy('id','DESC')->take(5)->get();
        $services = Service::orderBy('id','DESC')->with('skills')->get();
        return view('admin.home.index', compact([
            'skillCount',
            'educationCount',
            'experienceCount',
            'serviceCount',
            'projectsCount',
            'testimonialCount',
            'messagesCount',
            'usersCount',
            'testimonials',
            'skills',
            'services',
            'projects',
        ]));
    }
}
