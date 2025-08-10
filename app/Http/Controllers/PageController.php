<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Media;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Message;
use App\Models\User;
use App\Models\About;
class PageController extends Controller
{
    public function index() {
        $abouts = About::orderBy('id','DESC')->get();
        $mediasHome = Media::orderBy('id','DESC')->take(5)->get();
        $projectsCount = Project::count();
        $experienceCount = Experience::count();
        $services = Service::orderBy('id','DESC')->with('skills')->get();
        $educations = Education::orderBy('id','DESC')->get();
        $experiences = Experience::orderBy('id','DESC')->get();
        $projects = Project::orderBy('id','DESC')->get();
        $testimonials = Testimonial::orderBy('id','DESC')->get();
        return view('pages.home.index',compact(
            [
                'abouts',
                'mediasHome',
                'projectsCount',
                'experienceCount',
                'services',
                'educations',
                'experiences',
                'projects',
                'testimonials',
            ]
        ));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:20', // added phone
            'subject'     => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Message::create([
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'], // now from validated
            'subject'     => $validated['subject'],
            'description' => $validated['description'],
            'status'      => 0,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

}
