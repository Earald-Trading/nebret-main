<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    // Should return the latest three listings to the view.
    public function index(Request $request)
    {
        $select = [
            'id', 'beds', 'baths', 'house_type', 'lot', 'subcity',
            'featured', 'reduced_price', 'images', 'job_finished', 'updated_at'
        ];

        $most_liked = Like::selectRaw('upload_id as id, count(upload_id) as count')->groupBy('upload_id')->orderBy('count', 'DESC')->limit(3)->get()->pluck('id');

        $featured =  Upload::where(['featured' => 1, 'job_finished' => false])->select($select)->orderBy('updated_at', 'DESC')->limit(3)->get();
        $reduced_price = Upload::where([ 'reduced_price' => 1, 'job_finished' => false ])->select($select)->orderBy('updated_at', 'DESC')->limit(3)->get();
        $most_liked =  Upload::select($select)->find($most_liked->count() != 0 ? $most_liked->all() : null);

        if($request->expectsJson()) {
            return response(compact('featured', 'reduced_price', 'most_liked'), 200);
        }

        return view('welcome', compact('featured', 'reduced_price', 'most_liked'));
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

    public function userRequest(Request $request)
    {
        return view('listings.request');
    }

    public function emailAdmin(Request $request)
    {
        return redirect()->back();
    }

    /**
     * Get images form storage
     *
     * @param \Illuminate\Http\Request $request
     * @param string $path
     * @param int $number
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request, $path, $number = null)
    {
        $images = storage_path("app/{$path}");

        if (! Storage::exists($path)) {
            abort(404);
        }

        if ($number == null) {
            if ($request->expectsJson()) {
                return response([
                    'images' => count(Storage::allFiles($path))
                ], 200);
            }
            $number = 0;
        }

        $images = storage_path("app/{$path}");
        foreach (glob("{$images}/{$number}.*") as $image) {
            return response()->file($image)->setCache([
                'last_modified' => null,
                'max_age' => 432000
            ]);
        }

        abort(404);
    }
}
