<div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
    <div class="container">
        @if (isset($featured) && !empty($featured))
            <h3>{{ __('Featured Posts') }}</h3>
            @include('inc.displaylistings', ['uploads' => $featured])
            <hr />
        @endif
        @if (isset($reduced_price) && !empty($reduced_price))
            <h3>{{ __('Discounts') }}</h3>
            @include('inc.displaylistings', ['uploads' => $reduced_price])
            <hr />
        @endif
        @if (isset($most_liked) && !empty($most_liked))
            <h3>{{ __('Most Liked') }}</h3>
            @include('inc.displaylistings', ['uploads' => $most_liked])
            <hr />
        @endif
        @if (isset($uploads))
            @include('inc.displaylistings', ['uploads' => $uploads])
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
