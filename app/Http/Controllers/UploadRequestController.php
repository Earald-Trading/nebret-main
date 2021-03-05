<?php

namespace App\Http\Controllers;

use App\Models\UploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'phone_number' => "required|string",
            'house_type' => "required|string|exists:house_types,type",
            'purchase_type' => "required|string"
        ]);

        $req = new UploadRequest;
        $req->user_id = Auth::user()->id;
        $req->house_type = $request->input('house_type');
        $req->purchase_type = $request->input('purchase_type');
        $req->phone = $request->input('phone_number');
        $req->seen = false;
        $req->save();

        return redirect('/request')->with('success', 'Request Sent Successfully!');
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
        // $req = UploadRequest::find($id);
        // $req->seen = true;
        // $req->save();

        // return redirect('/request')->with('success', 'Successfully Updated');
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
        $req = UploadRequest::find($id);
        $req->seen = true;
        $req->save();

        return redirect('/request')->with('success', 'Successfully Updated');
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
