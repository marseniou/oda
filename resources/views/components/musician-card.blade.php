<x-box class="rounded shadow-lg">
    <figure class="image">
        <img src="{{URL::to('/')}}/{{$image}}" alt="">
    </figure>
    <div class="title text-center text-lg tracking-wide text-primary leading-9">{{$name}}</div>
    <div class="text-secondary-content text-center text-md tracking-tigher font-semibold">{{$instrument}}</div>
</x-box>