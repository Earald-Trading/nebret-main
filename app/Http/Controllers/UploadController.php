<?php

namespace App\Http\Controllers;

use App\Models\Like;
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
            'featured' => 'in:false,true',
            'openhouse' => 'in:false,true',
            'newconstruction' => 'in:false,true',
            'job_finished' => 'in:false,true',
        ]);

        $checkboxes = ['featured', 'openhouse', 'newconstruction', 'job_finished'];

        foreach($checkboxes as $checkbox) {
            $value = $request[$checkbox];
            if ($value == "true") {
                $request[$checkbox] = true;
            } else if ($value == "false") {
                $request[$checkbox] = false;
            }
        }
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
     * Make query for listings
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function makeQuery(Request $request)
    {
        $query = [];

        if ($request->filled('type')) {
            switch($request->query('type')) {
                case 'rent':
                    $query[] = ['listing_type', '=', 'For Rent'];
                    break;
                case 'sale':
                    $query[] = ['listing_type', '=', 'For Sale'];
                    break;
                case 'foreclosure':
                    $query[] = ['listing_type', '=', 'Foreclosure'];
                    break;
                case 'jointventure':
                    $query[] = ['listing_type', '=', 'Joint Venture'];
                    break;
                case 'sold':
                    $query[] = ['job_finished', '=', true];
                    break;
            }
        }

        if ($request->filled('htype')) {
            $query[] = ['house_type',  '=', $request->query('htype')];
        }

        if ($request->filled('subcity')) {
            $query[] = ['subcity',  '=', $request->query('subcity')];
        }

        if ($request->filled('beds')) {
            switch($request->query('beds')) {
                case 1:
                    $query[] = ['beds', '=', 1];
                    break;
                case 2:
                    $query[] = ['beds', '=', 2];
                    break;
                case 3:
                    $query[] = ['beds', '=', 3];
                    break;
                case 4:
                    $query[] = ['beds', '=', 4];
                    break;
                case 5:
                    $query[] = ['beds', '>', 5];
                    break;
            }
        }

        if ($request->filled('area')) {
            switch($request->query('area')) {
                case 1:
                    $query[] = ['footprint', '<=', 100];
                    break;
                case 2:
                    $query[] = ['footprint', '>', 100];
                    $query[] = ['footprint', '<=', 200];
                    break;
                case 3:
                    $query[] = ['footprint', '>', 200];
                    $query[] = ['footprint', '<=', 300];
                    break;
                case 4:
                    $query[] = ['footprint', '>', 300];
                    $query[] = ['footprint', '<=', 400];
                    break;
                case 5:
                    $query[] = ['footprint', '>', 400];
                    break;
            }
        }

        if ($request->has('featured')) {
            $query[] = ['featured', '=', 1];
        }
        if ($request->has('reduced')) {
            $query[] = ['reduced_price', '=', 1];
        }
        if ($request->has('open')) {
            $query[] = ['openhouse', '=', 1];
        }
        if ($request->has('new')) {
            $query[] = ['newconstruction', '=', 1];
        }

        if ($request->filled('min_price')) {
            $query[] = ['price', '>=', $request->query('min_price')*100];
        }

        if ($request->filled('max_price')) {
            $query[] = ['price', '<', $request->query('max_price')*100];
        }

        return $query;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uploads = Upload::where($this->makeQuery($request))
            ->select('id', 'beds','baths', 'house_type', 'listing_type',
                'footprint', 'subcity', 'featured', 'reduced_price',
                'job_finished', 'updated_at')
            ->orderBy('updated_at', 'DESC')->paginate(15);

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
            'data' => [],
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

        $upload['liked'] = false;
        if (Auth::user() && Like::where([
            'user_id' => Auth::user()->id,
            'upload_id' => $id
        ])->first()) {
            $upload['liked'] = true;
        }

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
        )->find($id);

        if (!$upload) {
            abort(404);
        }

        if ($upload->job_finished) {
            return redirect()->route('listings.show', compact('id'));
        }

        $upload['user_email'] = $upload->user->email;

        return view('listings.add', [
            'title' => 'Edit',
            'header' => 'Edit Listing.',
            'description' => 'Here you edit a previously uploaded listing.',
            'data' => $upload,
            'route' => route('listings.update', ['id' => $id]),
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
        } else if($upload_collection['price'] > $upload->price) {
            $upload_collection['reduced_price'] = false;
        }

        $upload->update($upload_collection);

        return redirect()->route('listings.show', ['id' => $upload->id]);
    }

    /**
     * Like the resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $id)
    {
        $upload = Upload::find($id);

        if (!$upload) {
            abort(404);
        }
        $like = Like::where([
            'user_id' => Auth::user()->id,
            'upload_id' => $id
        ]);

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'upload_id' => $id
            ]);
        }

        if ($request->expectsJson()) {
            return response([],204);
        }

        return redirect()->route('listings.show', ['id' => $upload->id]);
    }
}
