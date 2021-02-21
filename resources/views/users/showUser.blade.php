@extends('layouts.app')

@section('content')
    <div class="container" style="width: 90% !important; margin: auto !important;">
        <div class="row justify-content-center my-4">
            <img src="https://cdn.pixabay.com/photo/2014/03/24/17/19/teacher-295387_960_720.png" alt="Avatar" class="avatar">
        </div>
        <div class="text-center mt-5 mb-1 h3">{{$user->first_name}} {{$user->last_name}}</div>
        <div class="text-center lead mt-0 mb-3">
            @if ($user->is_admin)
                <span class="h6 badge badge-info">Admin</span>
            @else
                <span class="h6 badge badge-info">User</span>
            @endif
        </div>
        <h5 class="text-center" style="text-decoration-line: underline !important">{{$user->email}}</h5>
        <div class="lead text-center my-3">-- phone_number --</div>
        <div class="row justify-content-center mt-5 mb-3">
            <div class="btn btn-outline-danger text-center">Remove Account</div>
        </div>

    </div>
@endsection
