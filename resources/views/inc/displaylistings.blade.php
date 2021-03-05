@php $i = 0; @endphp
@foreach($uploads as $upload)
    @if ($i % 3  == 0)
        <div class="row my-5">
    @endif
    @if (is_null($upload))
        @continue
    @endif
    @php $updated_at = \Carbon\Carbon::parse($upload->updated_at) @endphp
    <div class="col" onclick="location.href='{{ route('listings.show', ['id' => $upload->id]) }}';"
         onmouseover="hover(document.getElementById('cover_img_{{ $upload->id }}'), {{ $upload->id }})"
         onmouseout="unhover(document.getElementById('cover_img_{{ $upload->id }}'), {{ $upload->id }})"
        style="cursor: pointer;overflow:hidden;">
        <div class="card listing-card" style="width: 20rem !important;">
            <img class="relative card-img" src="{{ route('images', ['id' => $upload->id, 'number' => 0 ]) }}"
               id="cover_img_{{ $upload->id }}"
               style="object-fit: cover !important; width: 20rem !important; height: 12rem !important;" />

            <div class="position-absolute mt-2 ml-2">
                <span class="badge badge-success">
                    @if ($updated_at->diffInDays() > 30)
                        {{ _($updated_at->format('d, M Y')) }}
                    @elseif ($updated_at->diffInMinutes() < 60)
                        {{ _('New') }}
                    @elseif ($updated_at->diffInHours() < 24)
                        {{ _('New') }} - {{ _($updated_at->diffForHumans()) }}
                    @else
                        {{ _($updated_at->diffForHumans()) }}
                    @endif
                </span>
                @if ($upload->job_finished)
                    <span class="badge badge-danger">
                        {{ _('Sold') }}
                    </span>
                @else
                    @if ($upload->featured)
                        <span class="badge badge-dark">
                            {{ _('Featured')
                        }}
                        </span>
                    @endif
                    @if ($upload->reduced_price)
                        <span class="badge badge-secondary">
                            {{ _('Reduced Price') }}
                        </span>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <div class="card-text text-small">
                    {{--What the hell is &#x0009.--}}
                    <b> {{ $upload->beds }} </b> <i>{{ _('Bed Size') }}</i> &#x0009
                    <b> {{ $upload->baths }}</b> <i>{{ _('Bath Size') }}</i> &#x0009
                    <b> {{ $upload->footprint }} </b> <i>{{ _('sqmr') }}</i>
                </div>
                <div class="card-text">
                    {{ _('Location Addis Ababa,') }} {{ __($upload->subcity) }}
                </div>
                <div class="card-text">
                    <b> {{ __($upload->house_type) }} </b>
                </div>
            </div>
        </div>
    </div>
    @if (($i + 1) % 3 == 0)
        </div>
    @endif
    @php ++$i; @endphp
@endforeach
