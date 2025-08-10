<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index(){
        $educations = Education::latest()->get();
        return view('admin.educations.index',compact('educations'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required',
            'period' => 'required',
            'degree' => 'required',
        ]);
        $education = new Education();
        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->degree = $request->degree;
        $education->department = $request->department;
        $education->save();
        return redirect()->route('admin.educations.index')->with('flash_message', " Education Added!");
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'institution' => 'required',
            'period' => 'required',
            'degree' => 'required',
        ]);
        $education = Education::find($id);
        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->degree = $request->degree;
        $education->department = $request->department;
        $education->save();
        return redirect()->route('admin.educations.index')->with('flash_message', " Education Updated!");
    }
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return redirect()->route('admin.educations.index')->with('flash_message','Education deleted Successfully');
    }
}
