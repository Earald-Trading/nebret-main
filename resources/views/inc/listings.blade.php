<div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
    <div class="container container-fluid">
        @if (isset($featured) && !$featured->isEmpty())
            <h3>{{ __('Featured Posts') }}</h3>
            @include('inc.displaylistings', ['uploads' => $featured])
            <hr />
        @endif
        @if (isset($reduced_price) && !$reduced_price->isEmpty())
            <h3>{{ __('Discounts') }}</h3>
            @include('inc.displaylistings', ['uploads' => $reduced_price])
            <hr />
        @endif
        @if (isset($most_liked) && !$most_liked->isEmpty())
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

    function make_image_url(path, number) {
        var base = window.location.protocol + "//" + window.location.host;
        var url = new URL("/images/"+path+"/"+number, base);

        return url.toString();
    }
    function hover(element, path) {
        if (intervalvar != 0)
            return;

        $(element).attr('src', make_image_url(path, index));
        ++index;

        intervalvar = setInterval(function() {
            if (index > 2)
                index = 0;

            $(element).attr('src', make_image_url(path, index));
            ++index;
        }, 2000);
    }

    function unhover(element, path) {
        clearInterval(intervalvar);
        intervalvar = 0;
        index = 1;

        $(element).attr('src', make_image_url(path, 0));
    }
</script>
