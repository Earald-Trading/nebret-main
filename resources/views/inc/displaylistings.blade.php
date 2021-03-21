@php $i = 0; @endphp
@foreach($uploads as $upload)
    @if ($i % 3  == 0)
        <div class="row my-md-5 my-sm-3">
    @endif
    @if (is_null($upload))
        @continue
    @endif
    @php $updated_at = \Carbon\Carbon::parse($upload->updated_at) @endphp
    <div class="col-lg-4 col-md-4 col-sm-12 my-md-5 my-sm-3">
        <a  class="text-dark text-decoration-none" href="{{ route('listings.show', ['id' => $upload->id]) }}"
         onmouseover="hover(document.getElementById('cover_img_{{ $upload->id }}'), '{{ $upload->images }}')"
         onmouseout="unhover(document.getElementById('cover_img_{{ $upload->id }}'), '{{ $upload->images }}')"
        style="cursor: pointer;overflow:hidden;">
        <div class="card listing-card my-3" style="min-width: 20rem !important;">
            <img class="relative card-img" src="{{ route('images', ['path' => $upload->images, 'number' => 0 ]) }}"
               id="cover_img_{{ $upload->id }}"
               style="object-fit: cover !important; min-width: 20rem !important; height: 12rem !important;" />

            <div class="position-absolute mt-2 ml-2">
                <span class="badge badge-success">
                    @if ($updated_at->diffInDays() > 30)
                        {{ __($updated_at->format('d, M Y')) }}
                    @elseif ($updated_at->diffInMinutes() < 60)
                        {{ __('New') }}
                    @elseif ($updated_at->diffInHours() < 24)
                        {{ __('New') }} - {{ __($updated_at->diffForHumans()) }}
                    @else
                        {{ __($updated_at->diffForHumans()) }}
                    @endif
                </span>
                @if ($upload->job_finished)
                    <span class="badge badge-danger">
                        {{ __('Sold') }}
                    </span>
                @else
                    @if ($upload->featured)
                        <span class="badge badge-dark">
                            {{ __('Featured')
                        }}
                        </span>
                    @endif
                    @if ($upload->reduced_price)
                        <span class="badge badge-secondary">
                            {{ __('Reduced Price') }}
                        </span>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <div class="card-text text-small">
                    {{--What the hell is &#x0009.--}}
                    <b> {{ $upload->beds }} </b> <i>{{ __('Bedrooms') }}</i> &#x0009
                    <b> {{ $upload->baths }}</b> <i>{{ __('Baths') }}</i> &#x0009
                    <b> {{ $upload->footprint }} </b> <i>{{ __('sqmr') }}</i>
                </div>
                <div class="card-text">
                    {{ __('Location') }} {{ __('Addis Ababa') }}, {{ __($upload->subcity) }}
                </div>
                <div class="card-text">
                    <b> {{ __($upload->house_type) }} </b>
                </div>
            </div>
        </div>
    </a>
    </div>
    @if (($i + 1) % 3 == 0)
        </div>
    @endif
    @php ++$i; @endphp
@endforeach
