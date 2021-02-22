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
     * Temporary Methods
     *
     */
    public function showListing(){
        return view('listings.showListing');
    }
    public function listing(){
        return view('listings.listings');
    }
    public function showUser($id){
        $user = User::select('first_name', 'last_name', 'email', 'is_admin')->find($id);
        return view('users.showUser')->with('user', $user);
    }
    public function user(){
        $users = User::latest()->paginate(10);
        return view('users.users')->with('users', $users);
    }
    public function editUser(){
        return view('users.editUser');
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
