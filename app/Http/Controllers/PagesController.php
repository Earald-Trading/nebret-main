<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    // Should return the latest three listings to the view.
    public function index()
    {
        $select = [
            'id', 'beds', 'baths', 'house_type', 'footprint', 'subcity',
            'featured', 'reduced_price', 'job_finished', 'updated_at'
        ];
        $most_liked = Like::selectRaw('upload_id as id, count(*) as count')->groupBy('upload_id')->orderBy('count', 'DESC')->first();


        $uploads = [
            Upload::where('featured', 1)->select($select)->inRandomOrder()->first(),
            Upload::where('reduced_price', 1)->select($select)->inRandomOrder()->first(),
            Upload::select($select)->find($most_liked ? $most_liked->id : null),
        ];
        return view('welcome', compact('uploads'));
    }

    public function survey()
    {
        return view('survey');
    }

    public function about()
    {
        return view('about');
    }

    public function request()
    {
        return view('listings.request');
    }

    public function changelocale(Request $request)
    {
        $locale = $request->input('locale');

        if (in_array($locale, ['en', 'am'])) {
            $request->session()->put('locale', $locale);
        }

        return redirect()->back();
    }

    /**
     * Get images form storage
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param int $number
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request, $id, $number = null)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            abort(404);
        }

        if ($number == null) {
            if ($request->expectsJson()) {
                return response([
                    'images' => count(Storage::allFiles($upload['images']))
                ], 200);
            }
            $number = 0;
        }

        $images = storage_path("app/{$upload->images}");
        foreach (glob("{$images}/{$number}.*") as $image) {
            return response()->file($image);
        }

        abort(404);
    }
}
