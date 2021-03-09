@extends ('layouts.app')
@section('content')
    <div class="container" style="width: 90% !important; margin: auto !important;">
        <h3 class="my-3">
            @if ($user->id == Auth::user()->id)
               {{ __('Your Likes') }}
            @else
                {{ $user->first_name }} {{ $user->last_name }} {{ __('Likes.') }}
            @endif
        </h3>
        @include('inc.listings')
    </div>
@endsection
