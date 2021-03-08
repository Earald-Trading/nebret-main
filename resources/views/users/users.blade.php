@extends('layouts.app')

@section('content')
    <div class="container m-5 px-5 py-4">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('E-mail Address') }}</th>
                    <th scope="col">{{ __('Phone Number') }}</th>
                    <th scope="col">{{ __('Type') }}</th>
                    <th scope="col" class="text-danger">{{ __('Delete User') }}</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0 && isset($users))
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>
                                <a href="{{ route('users.show', ['id' => $user->id]) }}">
                                     {{ $user->first_name }} {{ $user->last_name }}
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '--' }}</td>
                            <td class="text-secondary">
                                @if ($user->is_admin)
                                   {{ __('Admin') }}
                                @elseif ($user->is_agent)
                                   {{ __('Agent') }}
                                @else
                                   {{ __('User') }}
                                @endif
                            </td>
                            <td class="text-danger">
                                @if (!$user->is_agent || ($user->is_agent && !$user->is_admin))
                                    <button class="btn btn-outline-danger" onclick="document.getElementById('user-delete-{{ $user->id }}-form').submit();">
                                       {{ __('Delete User') }}
                                    </button>
                                    <form id="user-delete-{{ $user->id }}-form" class="d-none" method="POST" action="{{ route('users.delete', ['id' => $user->id]) }}">
                                        @csrf
                                    </form>
                                @endif
                            </td>
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
