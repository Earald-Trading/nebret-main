<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param bool $required
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    protected function validateRequest(Request $request, $required = true)
    {
        $required_rule = $required ? 'required|' : '';

        $request->validate([
            'user_email' => "{$required_rule}string|email|exists:users,email",
            'price' => "{$required_rule}numeric",
            'type' =>  "{$required_rule}string",
            'beds' => "{$required_rule}integer",
            'baths' => "{$required_rule}integer",
            'footprint' => "{$required_rule}integer",
            'lot' => "{$required_rule}integer",
            'year' => "{$required_rule}integer",
            'logline' => "{$required_rule}string",
            'youtube_id' => "{$required_rule}string|size:11",
            'images' => "{$required_rule}file|mimes:zip",
            'latitude' => "{$required_rule}numeric",
            'longitude' => "{$required_rule}numeric",
            'subcity' => "{$required_rule}string|exists:states,name",
            'wereda' => "{$required_rule}integer",
            'houseno' => "{$required_rule}string",
            'purchase_status' => "{$required_rule}in:sale,rent,foreclosure",
            'featured' => 'in:on,1,true',
            'openhouse' => 'in:on,1,true',
            'newconstruction' => 'in:on,1,true'
        ]);

        isset($request['featured']) ? $request['featured'] = true : $request['featured'] = false;

        isset($request['openhouse']) ? $request['openhouse'] = true : $request['openhouse'] = false;

        isset($request['newconstruction']) ? $request['newconstruction'] = true : $request['newconstruction'] = false;
    }

    /**
     * Validate uploaded zip file
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @throws \Illuminate\Validation\ValidationException
     * @return \ZipArchive
     */
    protected function validateZip($file)
    {
        $images = new ZipArchive;
        $images->open($file->path());
        $names = [];

        for ($i = 0; $i < $images->numFiles; ++$i) {
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
     * Stores images in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \ZipArchive|null $images
     * @param \App\Models\Upload $upload
     *
     * @return string
     */
    protected function storeImages(Request $request, $images, Upload $upload = null)
    {
        $folder_name = hash(
            'sha256',
            "{$request['logline']} {$request['latitude']} {$request['longtiude']} {$request['houseno']}"
        );

        if (isset($request['images'])) {
            for ($i = 0; $i < $images->numFiles; ++$i) {
                $extension = pathinfo($images->getNameIndex($i), PATHINFO_EXTENSION);
                $contents = $images->getFromIndex($i);
                Storage::put("{$folder_name}/{$i}.{$extension}", $contents);
            }
        } else if ($upload->images !== $folder_name) {
            Storage::move($upload->images, $folder_name);
        }

        return $folder_name;
    }

    /**
     * Make collection to fill the upload model
     *
     * @param \Illuminate\Http\Request $request
     * @param string $folder_name
     *
     * @return \App\Models\Upload
     */

    protected function makeUpload(Request $request, $folder_name)
    {
        $collection = collect($request->only(
            'type',
            'beds',
            'baths',
            'footprint',
            'lot',
            'year',
            'logline',
            'youtube_id',
            'latitude',
            'longitude',
            'wereda',
            'houseno',
            'purchase_status',
            'featured',
            'openhouse',
            'newconstruction',
        ))->merge([
            'admin_id' => $request->user()->id,
            'images' => $folder_name
        ]);

        if (isset($request['user_email'])) {
            $collection['user_id'] = User::where('email', $request['user_email'])->first()->id;
        }

        if (isset($request['price'])) {
            $collection['price'] =  (int)((float)$request['price'] * 100);
        }

        if (isset($request['subcity'])) {
            $collection['subcity'] =  State::where('name', $request['subcity'])->first()->id;
        }


        return $collection;
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
        return view('upload', [
            'title' => 'Upload',
            'header' => 'Upload Listing',
            'description' => 'Here you upload a listing by request of user.',
            'subcity' => State::select('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $images = $this->validateZip($request->file('images'));
        $folder_name = $this->storeImages($request, $images);

        Upload::create($this->makeUpload($request, $folder_name)->all());

        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fields = collect([
            'uploads.id as id', 'price', 'type', 'beds', 'baths', 'footprint',
            'lot', 'year', 'logline', 'images', 'youtube_id',
            'states.name as subcity',
            'purchase_status', 'featured', 'openhouse', 'newconstruction'
        ]);

        if (Auth::is_admin()) {
            $fields = $fields->merge(['user_id', 'latitude', 'longitude', 'wereda', 'houseno']);
        }
        $upload = Upload::subcity()->select($fields->all())->find($id);
        if (!$upload) {
            abort(404);
        }

        if (Auth::is_admin()) {
            $upload['user_email'] = $upload->user->email;
        }

        $upload['images'] = count(Storage::allFiles($upload['images']));

        return view('listings.show', $upload);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload = Upload::subcity()
            ->select(
                'user_id',
                'price',
                'type',
                'beds',
                'baths',
                'footprint',
                'lot',
                'year',
                'logline',
                'images',
                'youtube_id',
                'latitude',
                'longitude',
                'states.name as subcity',
                'wereda',
                'houseno',
                'purchase_status',
                'featured',
                'openhouse',
                'newconstruction',
            )
            ->find($id);

        if (!$upload) {
            abort(404);
        }

        $upload['user_email'] = $upload->user->email;

        return view('upload', [
            'title' => 'Edit',
            'header' => 'Edit Listing.',
            'description' => 'Here you edit a previously uploaded listing.',
            'subcity' => State::select('name')->get(),
            'data' => $upload
        ]);
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
        $upload = Upload::find($id);

        if (!$upload) {
            abort(404);
        }

        $this->validateRequest($request, false);

        $images = null;
        if (isset($request['images'])) {
            $images = $this->validateZip($request->file('images'));
        }
        $folder_name = $this->storeImages($request, $images, $upload);

        $upload->update($this->makeUpload($request, $folder_name)->all());

        return $this->edit($upload->id);
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
