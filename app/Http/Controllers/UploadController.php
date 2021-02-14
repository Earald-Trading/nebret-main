<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected function validateStore(Request $request)
    {
        $request->validate([
            'user_email' => 'required|string|email',
            'images' => 'required|file',
            'price' => 'required|numeric',
            'logline' => 'required|string',
            'youtube_id' => 'required|string|size:11',
            'images' => 'required|array|size:6',
            'images.*' => 'required|image',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'subcity' => 'required|string',
            'wereda' => 'required|integer',
            'houseno' => 'required|string',
            'featured' => 'boolean'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        $user = User::where('email', $request['user_email'])->first();
        if (!$user) {
            return view('upload');
        }

        $folder_name = hash('sha256', "{$request['logline']} {$request['latitude']} {$request['longtiude']} {$request['houseno']}");

        $images = $request->file('images');
        for($i = 0; $i < 6; ++$i) {
            $images[$i]->storeAs($folder_name, strval($i+1) . $images[$i]->getClientOriginalExtension());
        }

        $upload = new Upload($request->only('logline', 'youtube_id', 'latitude','longitude', 'subcity', 'wereda', 'houseno', 'featured'));
        $upload->admin_id = $request->user()->id;
        $upload->images = storage_path($folder_name);
        $upload->user_id = $user->id;
        $upload->price = (int)((float)$request['price'] * 100);
        $upload->save();

        return view('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
