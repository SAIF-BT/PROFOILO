<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('image')) {
            $imageUrl = $this->uploadToImgbb($request->file('image'));
            if ($imageUrl) {
                $project->image = $imageUrl;
            }
        }

        $project->save();
        return redirect()->route('admin.projects.index')->with('flash_message', "Project Added Successfully!");
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return back()->withErrors('Project not found.');
        }
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = Project::find($id);
        if (!$project) {
            return back()->withErrors('Project not found.');
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('image')) {
            $imageUrl = $this->uploadToImgbb($request->file('image'));
            if ($imageUrl) {
                $project->image = $imageUrl;
            }
        }

        $project->save();
        return redirect()->route('admin.projects.index')->with('flash_message', "Project Updated Successfully!");
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return back()->withErrors('Project not found.');
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('flash_message', 'Project deleted successfully.');
    }

    /**
     * Uploads an image to ImgBB and returns the URL.
     */
    private function uploadToImgbb($file)
    {
        try {
            $apiKey = config('services.imgbb.key');
            if (!$apiKey) {
                Log::error('IMGBB API key not set.');
                return null;
            }

            $imageData = base64_encode(file_get_contents($file));
            $response = Http::withoutVerifying()
    ->asForm()
    ->post('https://api.imgbb.com/1/upload', [
        'key' => $apiKey,
        'image' => $imageData,
    ]);

            $data = $response->json();

            if ($response->successful() && isset($data['data']['url'])) {
                return $data['data']['url'];
            }

            Log::error('IMGBB upload failed', ['response' => $response->body()]);
        } catch (\Exception $e) {
            Log::error('IMGBB upload exception', ['error' => $e->getMessage()]);
        }

        return null;
    }
}
