<div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
    <div class="container">
        @if (isset($uploads))
            @php $i = 0; @endphp
            @foreach($uploads as $upload)
                @if ($i % 3  == 0)
                    <div class="row my-5">
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
                                    {{ $updated_at->format('d, M Y') }}
                                @elseif ($updated_at->diffInMinutes() < 60)
                                    New
                                @elseif ($updated_at->diffInHours() < 24)
                                    New - {{ $updated_at->diffForHumans() }}
                                @else
                                    {{ $updated_at->diffForHumans() }}
                                @endif
                            </span>
                            @if ($upload->reduced_price)
                                <span class="badge badge-danger">
                                    Reduced Price
                                </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="card-text text-small">
                                {{--What the hell is &#x0009.--}}
                                <b> {{ $upload->beds }} </b> <i>Bed Size</i> &#x0009
                                <b> {{ $upload->baths }}</b> <i>Bath Size</i> &#x0009
                                <b> {{ $upload->footprint }} </b> <i>sqmr</i>
                            </div>
                            <div class="card-text">
                                Location Addis Ababa, {{ $upload->subcity }}
                            </div>
                            <div class="card-text">
                                <span class="float float-right">
                                    <!--Must include the listingId as a param-->
                                    <a href="{{ route('images', ['id' => $upload->id, 'number' => 0 ]) }} ">View Details</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @if (($i + 1) % 3 == 0)
                    </div>
                @endif
                @php ++$i; @endphp
            @endforeach
        @endif
    </div>
</div>

<script type="text/javascript">
    var intervalvar = 0;
    var index = 1;

    function make_image_url(id, number) {
        var base = window.location.protocol + "//" + window.location.host;
        var url = new URL("/images/"+id+"/"+number, base);

        return url.toString();
    }
    function hover(element, id) {
        if (intervalvar != 0)
            return;

        $(element).attr('src', make_image_url(id, index));
        ++index;

        intervalvar = setInterval(function() {
            if (index > 2)
                index = 0;

            $(element).attr('src', make_image_url(id, index));
            ++index;
        }, 2000);
    }

    function unhover(element, id) {
        clearInterval(intervalvar);
        intervalvar = 0;
        index = 1;

        $(element).attr('src', make_image_url(id, 0));
    }
</script>
