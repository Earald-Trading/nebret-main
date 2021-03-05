<?php

namespace App\Http\Controllers;

use App\Models\UploadRequest;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $new_requests = UploadRequest::where('seen', false)->latest()->paginate(10);
        foreach ($new_requests as $item) {
            $users[] = User::find($item->user_id)->select('first_name', 'last_name');
        }

        return view('home')->with('new_requests', $new_requests)->with('users', $users);
    }
}
