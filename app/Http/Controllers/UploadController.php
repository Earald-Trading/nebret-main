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
            'house_type' =>  "{$required_rule}string|exists:house_types,type",
            'beds' => "{$required_rule}integer",
            'baths' => "{$required_rule}integer",
            'footprint' => "{$required_rule}integer",
            'lot' => "{$required_rule}integer",
            'year' => "{$required_rule}integer",
            'description' => "{$required_rule}string",
            'comparative_analysis' => "{$required_rule}string",
            'youtube_id' => "{$required_rule}string|size:11",
            'images' => "{$required_rule}file|mimes:zip",
            'latitude' => "{$required_rule}numeric",
            'longitude' => "{$required_rule}numeric",
            'subcity' => "{$required_rule}string|exists:states,state",
            'wereda' => "{$required_rule}integer",
            'houseno' => "{$required_rule}string",
            'listing_type' => "{$required_rule}string|exists:listing_types,type",
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
            'house_type',
            'beds',
            'baths',
            'footprint',
            'lot',
            'year',
            'description',
            'comparative_analysis',
            'youtube_id',
            'latitude',
            'longitude',
            'subcity',
            'wereda',
            'houseno',
            'listing_type',
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

        return $collection;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Upload::select(
            'id', 'beds','baths', 'house_type', 'listing_type', 'footprint', 'subcity', 'reduced_price', 'updated_at'
        )->paginate(15);
        return view('listings.listings', ['uploads' => $uploads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.add', [
            'title' => 'Upload',
            'header' => 'Upload Listing',
            'description' => 'Here you upload a listing by request of user.',
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
        dd($request->input());
        $this->validateRequest($request);
        $images = $this->validateZip($request->file('images'));
        $folder_name = $this->storeImages($request, $images);

        $upload = Upload::create($this->makeUpload($request, $folder_name)->all());

        return redirect()->route('listings.show', ['id' => $upload->id]);
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
            'id', 'images', 'youtube_id', 'description', 'house_type',
            'listing_type', 'beds', 'baths', 'footprint', 'lot',
            'year', 'price', 'subcity', 'featured', 'openhouse',
            'newconstruction', 'reduced_price', 'job_finished', 'updated_at'
        ]);

        if (Auth::user()) {
            $fields = $fields->merge(['comparative_analysis', 'latitude', 'longitude']);
        }

        if (Auth::is_agent()) {
            $fields = $fields->merge(['user_id', 'wereda', 'houseno']);
        }

        $upload = Upload::select($fields->all())->find($id);
        if (!$upload) {
            abort(404);
        }

        if (Auth::is_agent()) {
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
        $upload = Upload::select(
            'user_id',
            'images',
            'youtube_id',
            'description',
            'comparative_analysis',
            'house_type',
            'listing_type',
            'beds',
            'baths',
            'footprint',
            'lot',
            'year',
            'price',
            'latitude',
            'longitude',
            'subcity',
            'wereda',
            'houseno',
            'featured',
            'openhouse',
            'newconstruction',
            'reduced_price',
            'job_finished'
        )
            ->find($id);

        if (!$upload) {
            abort(404);
        }

        $upload['user_email'] = $upload->user->email;

        return view('listings.add', [
            'title' => 'Edit',
            'header' => 'Edit Listing.',
            'description' => 'Here you edit a previously uploaded listing.',
            'data' => $upload,
            'route' => route('listings.update', ['id' => $id])
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

        $upload_collection = $this->makeUpload($request, $folder_name)->all();

        if ($upload_collection['price'] < $upload->price) {
            $upload_collection['reduced_price'] = true;
        } else {
            $upload_collection['reduced_price'] = false;
        }

        $upload->update($upload_collection);

        return redirect()->route('listings.show', ['id' => $upload->id]);
    }
}
