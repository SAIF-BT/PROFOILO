<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Service;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $perpage = 5;
        $keyword = $request->get('search');
        if(!empty($keyword)){
            $skills = Skill::where('name', 'LIKE', '%' . $keyword . '%')
                       ->with('service')
                       ->orderBy('id', 'DESC')
                       ->paginate($perpage);
            $services = Service::all();
        } else {
            $skills = Skill::with('service')->orderBy('id', 'DESC')->latest()->paginate($perpage);
            $services = Service::all();
        }
        
        return view('admin.skills.index', compact(['skills','services']))->with('1', (request()->input('page',1)-1)*2);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'proficiency' => 'required',
        ]);
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->proficiency = $request->proficiency;
        $skill->service_id = $request->service_id;
        $skill->save();
        return redirect()->route('admin.skills.index')->with('flash_message', " Skill Added!");
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'proficiency' => 'required',
        ]);
        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->proficiency = $request->proficiency;
        $skill->service_id = $request->service_id;
        $skill->save();
        return redirect()->route('admin.skills.index')->with('flash_message', " Skill Updated!");
    }
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('flash_message','Skill deleted Successfully');
    }
}
