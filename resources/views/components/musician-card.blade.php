<x-box class="rounded shadow-lg !p-2">
    <div class="flex flex-col justify-center items-center">
        <figure class="image">
            <img src="{{URL::to('/')}}/{{$image}}" alt="">
        </figure>

        <a href="{{URL::to('/')}}/musicians/{{$slug}}"
            class="title text-center text-lg tracking-wide text-primary leading-9">{{$name}}</a>

        <div class="text-secondary-content text-center text-md tracking-tigher font-semibold">{{$instrument}}</div>
    </div>
</x-box>