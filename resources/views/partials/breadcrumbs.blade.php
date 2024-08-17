<div class="breadcrumbs text-sm tracking-wider">

    @unless ($breadcrumbs->isEmpty())
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)

                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li>{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ul>
    @endunless
</div>