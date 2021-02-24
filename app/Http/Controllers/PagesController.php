<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Get images form storage
     *
     * @param int $id
     * @param int $number
     * @return \Illuminate\Http\Response
     */
    public function image($id, $number)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            abort(404);
        }

        $images = storage_path("app/{$upload->images}");
        foreach (glob("{$images}/{$number}.*") as $image) {
            return response()->file($image);
        }
        abort(404);
    }
}
