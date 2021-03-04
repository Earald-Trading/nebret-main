<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    // Should return the latest three listings to the view.
    public function index()
    {
        return view('welcome');
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
    /**
     * Get images form storage
     *
     * @param int $id
     * @param int $number
     * @return \Illuminate\Http\Response
     */
    public function image($id, $number = null)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            abort(404);
        }

        if ($number == null) {
            return response([
                'images' => count(Storage::allFiles($upload['images']))
            ], 200);
        }

        $images = storage_path("app/{$upload->images}");
        foreach (glob("{$images}/{$number}.*") as $image) {
            return response()->file($image);
        }

        abort(404);
    }
}
