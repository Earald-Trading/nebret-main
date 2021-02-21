@extends('layouts.app')

@section('content')
    <div class="container my-5 pt-4">
        <form>
            <div class="card" style="width: 60% !important; margin: auto !important;">
                <div class="card-header">
                    <h4 class="text-center">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <label class="mt-3 mb-0" for="first_name">First Name: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>

                    <label class="mt-3 mb-0" for="last_name">Last Name: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>

                    <label class="mt-3 mb-0" for="email">Email: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="email" class="form-control" placeholder="myemail@exmaple.com" name="email">
                    </div>

                    <label class="mt-3 mb-0" for="phone_number">Phone Number: </label>
                    <div class="input-group input-group-sm mt-0 mb-3">
                        <input type="number" class="form-control" placeholder="Phone Number" name="phone_number">
                    </div>

                    <label class="form-label mt-3">Change Profile Picture:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar" id="avatar" accept=".jpeg|.png|.jpg" @if (! isset($data['avatar'])) required @endif>
                        <label class="custom-file-label" for="avatar">Choose file</label>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="btn btn-primary mr-3">Submit</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
