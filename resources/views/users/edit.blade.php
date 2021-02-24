@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    <div class="container my-5 pt-4">
        <form method="post" action="{{ route('user.update') }}">
            <div class="card" style="width: 60% !important; margin: auto !important;">
                <div class="card-header">
                    <h4 class="text-center">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <label class="mt-3 mb-0" for="first_name">First Name: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name"
                            value="{{ $first_name }}" />
                    </div>

                    <label class="mt-3 mb-0" for="last_name">Last Name: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                            value="{{ $last_name }}" />
                    </div>

                    <label class="mt-3 mb-0" for="email">Email: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="email" class="form-control" placeholder="myemail@exmaple.com" name="email"
                            value="{{ $email }}" />
                    </div>

                    <label for="phone" class="mt-3 mb-0">{{ __('Phone Number') }}:</label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+251</span>
                        </div>
                        <input id="email" type="numeric" class="form-control" name="phone">

                    </div>

                    {{-- <label class="form-label mt-3">Change Profile Picture:</label> --}}
                    {{-- <div class="custom-file"> --}}
                    {{-- <input type="file" class="custom-file-input" name="avatar" id="avatar" accept=".jpeg|.png|.jpg" @if (!isset($data['avatar'])) required @endif> --}}
                    {{-- <label class="custom-file-label" for="avatar">Choose file</label> --}}
                    {{-- </div> --}}
                </div>
                @csrf
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <button type="submit" class="btn btn-primary mr3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
