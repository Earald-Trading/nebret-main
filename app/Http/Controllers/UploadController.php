<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use ZipArchive;

class UploadController extends Controller
{
    /**
     * Validate request for store
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    protected function validateStore(Request $request)
    {
        $request->validate([
            'user_email' => 'required|string|email|exists:users,email',
            'price' => 'required|numeric',
            'logline' => 'required|string',
            'youtube_id' => 'required|string|size:11',
            'images' => 'required|file|mimes:zip',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'subcity' => 'required|string|exists:states,name',
            'wereda' => 'required|integer',
            'houseno' => 'required|string',
            'featured' => 'boolean',
            'selling' => 'boolean'
        ]);
    }

    /**
     * Validate uploaded zip file
     *
     * @param Illuminate\Http\UploadedFile $file
     * @throws \Illuminate\Validation\ValidationException
     * @return ZipArchive
     */
    protected function validateZip($file)
    {
        $images = new ZipArchive;
        $images->open($file->path());
        $names = [];

        for($i = 0; $i < $images->numFiles; ++$i) {
            $name[] = $images->getNameIndex($i);
        }

        $validator = Validator::make($names, [
            '*' => 'required|string|extension:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $images;
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
        $images = $this->validateZip($request->file('images'));

        $folder_name = hash(
            'sha256',
            "{$request['logline']} {$request['latitude']} {$request['longtiude']} {$request['houseno']}"
        );

        for($i = 0; $i < $images->numFiles; ++$i) {
            $extension = pathinfo($images->getNameIndex($i), PATHINFO_EXTENSION);
            $contents = $images->getFromIndex($i);
            Storage::put("{$folder_name}/{$i}.{$extension}", $contents);
        }

        $upload = new Upload($request->only(
            'logline', 'youtube_id', 'latitude','longitude',
            'wereda', 'houseno', 'featured', 'selling'
        ));
        $upload->admin_id = $request->user()->id;
        $upload->images = $folder_name;
        $upload->user_id = User::where('email', $request['user_email'])->first()->id;
        $upload->subcity = State::where('name', $request['subcity'])->first()->id;
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
