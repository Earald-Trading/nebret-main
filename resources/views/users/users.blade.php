@extends('layouts.app')

@section('content')
    <div class="container m-5 px-5 py-4">
        <div class="row mr-0 mb-3 justify-content-end">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="label my-0 justify-content-start">Search: </div>
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search with a keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) > 0 && isset($users))
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>--</td>
                        <td class="text-info">@if($user->is_admin) Admin @elseif ($user->is_agent) Agent @else User @endif</td>
                        <td><a href="/users/{{$user->id}}">View Detail</a></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="row text-center d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
