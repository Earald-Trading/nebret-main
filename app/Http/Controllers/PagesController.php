<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Should return the latest three listings to the view.
    public function index()
    {
        return view('welcome');
    }

    /**
     * Temporary Methods
     *
     */
    public function showListing(){
        return view('listings.showListing');
    }
    public function listing(){
        return view('listings.listings');
    }
    /**
     * End Temoprary Methods
     *
     */

    public function image($id, $number)
    {
        $upload = Upload::find($id);

        if (!$upload)
        {
            abort(404);
        }

        $images = storage_path("app/{$upload->images}");
        foreach(glob("{$images}/{$number}.*") as $image) {
            return response()->file($image);
        }
        abort(404);
    }
}
