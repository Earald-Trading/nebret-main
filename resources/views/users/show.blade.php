@extends('layouts.app')

@section('content')
    <div class="container" style="width: 90% !important; margin: auto !important;">
        <div class="row justify-content-center my-4">
            <img src="https://cdn.pixabay.com/photo/2014/03/24/17/19/teacher-295387_960_720.png" alt="Avatar"
                class="avatar">
        </div>
        <div class="text-center mt-5 mb-1 h3">{{ $first_name }} {{ $last_name }}</div>
        <div class="text-center lead mt-0 mb-3">
            @if ($is_admin)
                <span class="h6 badge badge-info">{{ __('Admin') }}</span>
            @elseif ($is_agent)
                <span class="h6 badge badge-info">{{ __('Agent') }}</span>
            @else
                <span class="h6 badge badge-info">{{ __('User') }}</span>
            @endif
        </div>
        <h5 class="text-center" style="text-decoration-line: underline !important">{{ $email }}</h5>
        <div class="lead text-center my-3">{{ $phone }}</div>
        <div class="row justify-content-center mt-5 mb-3">
            @if (Auth::is_admin() && Auth::user()->id != $id)
                @if (is_null($email_verified_at))
                    <form method="post" action="{{ route('users.update', ['id' => $id]) }}">
                        <input type="hidden" name="verify_email" value="true" />
                        @csrf
                        <input type="submit" class="btn btn-outline-danger text-center mr-2" value="{{ __('Verify Email') }}" />
                    </form>
                @endif

                <form method="post" action="{{ route('users.update', ['id' => $id]) }}">
                    @if (!$is_agent)
                            <input type="hidden" name="make_agent" value="true" />
                            <input type="submit" class="btn btn-outline-danger text-center mr-2" value="{{ __('Make Agent') }}" />
                    @else
                            <input type="hidden" name="make_agent" value="false" />
                            <input type="submit" class="btn btn-outline-danger text-center mr-2" value="{{ __('Revoke Agent') }}" />
                    @endif
                @csrf
                </form>

                @if (!$is_admin && $is_agent)
                    <form method="post" action="{{ route('users.update', ['id' => $id]) }}">
                        <input type="hidden" name="make_admin" value="true" />
                        @csrf
                        <input type="submit" class="btn btn-outline-danger text-center" value="{{ __('Make Admin') }}" />
                    </form>
                @endif
            @endif
            @if (Auth::user()->id == $id)
                <a href="{{ route('user.edit') }}" class="btn btn-outline-danger">{{  __('Edit Profile') }}</a>
            @endif
        </div>
    </div>
@endsection
