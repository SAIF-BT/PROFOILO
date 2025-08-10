<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'function' => 'required',
            'testimony' => 'required',
            'rating' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->function = $request->function;
        $testimonial->testimony = $request->testimony;
        $testimonial->rating = $request->rating;

        if ($request->hasFile('image')) {
            $url = $this->uploadToImgbb($request->file('image'));
            if ($url) {
                $testimonial->image = $url;
            }
        }

        $testimonial->save();
        return redirect()->route('admin.testimonials.index')->with('flash_message', 'Testimonial Added Successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return back()->withErrors('Testimonial not found.');
        }
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'function' => 'required',
            'testimony' => 'required',
            'rating' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return back()->withErrors('Testimonial not found.');
        }

        $testimonial->name = $request->name;
        $testimonial->function = $request->function;
        $testimonial->testimony = $request->testimony;
        $testimonial->rating = $request->rating;

        if ($request->hasFile('image')) {
            $url = $this->uploadToImgbb($request->file('image'));
            if ($url) {
                $testimonial->image = $url;
            }
        }

        $testimonial->save();
        return redirect()->route('admin.testimonials.index')->with('flash_message', 'Testimonial Updated Successfully!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return back()->withErrors('Testimonial not found.');
        }

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('flash_message', 'Testimonial deleted Successfully');
    }

    /**
     * Uploads an image to ImgBB and returns the image URL.
     */
    private function uploadToImgbb($file)
    {
        try {
            $apiKey = config('services.imgbb.key');
            if (!$apiKey) {
                Log::error('IMGBB API key is missing.');
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
