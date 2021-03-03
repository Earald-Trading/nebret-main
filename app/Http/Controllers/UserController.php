<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Validate the update method
     *
     * @param \Illuminate\Http\Request $request
     * @param bool $prefs
     * @throws \Illuminate\Validation\ValidationException
     * @return void
     */
    protected function validateUpdate(Request $request, $prefs = false)
    {
        if ($prefs) {
            $rules = [
                'first_name'   => 'string|max:255',
                'last_name'    => 'string|max:255',
                'email'        => 'string|email|max:255|unique:users',
                'phone'        => 'numeric|nullable|unique:users|digits:9',
            ];
        } else {
            $rules = [
                'make_admin'   => 'required_without_all:make_agent,verify_email',
                'make_agent'   => 'required_without_all:make_admin,verify_email',
                'verify_email' => 'required_without_all:make_agent,make_admin',
            ];
        }

        $request->validate($rules);
    }

    /**
     * Update preferences
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function updatePreferences(Request $request, User $user)
    {
        if (isset($request['email']) && $user->email == $request['email']) {
            unset($request['email']);
        }

        $this->validateUpdate($request, true);

        $user->update($request->only('first_name', 'last_name', 'email', 'phone'));
        return redirect()->route('user.profile');
    }

    /**
     * Edit User
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function editUser(Request $request, User $user)
    {
        if (!$user) {
            abort(404);
        }

        $this->validateUpdate($request);

        if (isset($request['make_admin'])) {
            $user->is_admin = true;
        } else if (isset($request['make_agent'])) {
            $user->is_agent = true;
        } else {
            $user->email_verified_at = now();
        }

        $user->save();

        return redirect()->route('users.show', ['id' => $user->id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.users', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }
        return view('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('user.profile');
        }

        $user = User::find($id);

        if (!$user) {
            abort(404);
        }
        return view('users.show', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if (Auth::user()->id == $id || $id == null) {
            return $this->updatePreferences($request, Auth::user());
        } else {
            $user = User::find($id);
            return $this->editUser($request, $user);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.edit', Auth::user());
    }

    /**
     * show the user likes
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function likes(Request $request, $id = null)
    {
        if ($id == null) {
            $user = Auth::user();
        } else {
            $user = User::find($id);
        }

        if (!$user) {
            abort(404);
        }

        // Fix this when eloquent has viable joins
        $uploads =  DB::table('likes as l')
            ->join('uploads as u', 'u.id', '=', 'l.upload_id')
            ->where('l.user_id', '=', $user->id)
            ->orderBy('u.updated_at', 'DESC')
            ->select(
                'u.id as id',
                'beds',
                'baths',
                'house_type',
                'listing_type',
                'footprint',
                'subcity',
                'reduced_price',
                'u.updated_at as updated_at'
            )
            ->paginate(15);

        return view('users.likes', compact('uploads', 'user'));
    }
}
