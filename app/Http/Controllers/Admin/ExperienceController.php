<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index(){
        $experiences = Experience::orderBy('id','DESC')->get();
        return view('admin.experiences.index', compact('experiences'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'period' => 'required',
        ]);
        $experience = new Experience();
        $experience->company = $request->company;
        $experience->period = $request->period;
        $experience->position = $request->position;
        $experience->save();
        return redirect()->route('admin.experiences.index')->with('flash_message', " Experience Added!");
    }
    public function update(Request $request, $id)
    {
        \Log::info($id);
        $request->validate([
            'company' => 'required',
            'period' => 'required',
        ]);
        $experience = Experience::find($id);
        $experience->company = $request->company;
        $experience->period = $request->period;
        $experience->position = $request->position;
        $experience->save();
        return redirect()->route('admin.experiences.index')->with('flash_message', " Experience Updated!");
    }
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('flash_message','Experience deleted Successfully');
    }
}
