<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Http;

class AboutController extends Controller
{
    public function index() {
        
    }
    public function edit() {
        $about = About::latest()->first();
        return view('admin.abouts.edit',compact(['about']));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'home_image' => 'nullable|image|max:2048',
        'banner_image' => 'nullable|image|max:2048',
    ]);

    $about = About::latest()->first();
    if (!$about) {
        return back()->withErrors('About record not found.');
    }

    $about->name = $request->name;
    $about->email = $request->email;
    $about->phone = $request->phone;
    $about->address = $request->address;
    $about->description = $request->description;
    $about->summary = $request->summary;
    $about->tagline = $request->tagline;
    $about->cv = $request->cv;

    // Upload image to ImgBB helper
    if ($request->hasFile('home_image')) {
        $url = $this->uploadToImgbb($request->file('home_image'));
        if ($url) {
            $about->home_image = $url;
        }
    }

    if ($request->hasFile('banner_image')) {
        $url = $this->uploadToImgbb($request->file('banner_image'));
        if ($url) {
            $about->banner_image = $url;
        }
    }

    $about->save();

    return redirect()->route('abouts.edit')->with('flash_message', 'Your Information has been successfully updated!');
}

private function uploadToImgbb($file)
{
    try {
        $apiKey = config('services.imgbb.key');
        if (!$apiKey) {
            \Log::error('IMGBB API key not set.');
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

        \Log::error('ImgBB upload failed', ['response' => $response->body()]);
    } catch (\Exception $e) {
        \Log::error('ImgBB upload exception', ['error' => $e->getMessage()]);
    }

    return null;
}


}
