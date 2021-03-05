@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 3rem !important;">
        <div class="row w-100 full-width" style="width: 100% !important;">
            {{-- <div class="col-12"> --}}
                <div class="row justify-content-center" style="width: 100% !important; margin: auto !important;">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title text-center"><h3>{{ __('Dashboard') }}</h3></div>
                            <div class="card-subtitle text-center mt-2"><h6>New Requests</h6></div>
                        </div>

                        <div class="card-body">
                            <table>
                                <tr class="row row-cols-auto my-3">
                                    <th class="col justify-content-center">Posted at</th>
                                    <th class="col justify-content-center">Name</th>
                                    <th class="col justify-content-center">House Type</th>
                                    <th class="col justify-content-center">Purchase Type</th>
                                    <th class="col justify-content-center">Phone Number</th>
                                    <th class="col justify-content-center"></th>
                                </tr>
                                @foreach ($new_requests as $item)
                                    <tr class="row row-cols-auto my-3">
                                        <td class="col justify-content-center @if(session('success')) text-secondary @else text-primary @endif">{{ $item->created_at }}</td>
                                        <td class="col justify-content-center @if(session('success')) text-secondary @else text-primary @endif">{{ $item->user_id }}</td>
                                        <td class="col justify-content-center @if(session('success')) text-secondary @else text-primary @endif">{{ $item->house_type }}</td>
                                        <td class="col justify-content-center @if(session('success')) text-secondary @else text-primary @endif">{{ $item->purchase_type }}</td>
                                        <td class="col justify-content-center @if(session('success')) text-secondary @else text-primary @endif">{{ $item->phone }}</td>
                                        <td class="col justify-content-center">
                                            <button type="button" class="btn btn-primary btn-sm" @if(session('success')) hidden @endif>
                                                <a href="/request/{{$item->id}}" style="text-decoration: none !important; color: white !important;">dismiss</a>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="form">
                                            <div class="modal-content"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection
