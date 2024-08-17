<div class="lg:grid lg:grid-cols-12 lg:gap-8">

    <div class="flex flex-col justify-center items-center col-span-3 lg:border-r lg:border-primary mb-8 lg:mb-0">
        <p class="xl:text-normal text-primary tracking-wide text-sm">
            {{Carbon\Carbon::parse($concert->date)->translatedFormat('l')}}
        </p>
        <p class="title text-9xl display leading-none">
            {{Carbon\Carbon::parse($concert->date)->format('j')}}
        </p>
        <p class="text-primary tracking-widest text-sm">
            {{Carbon\Carbon::parse($concert->date)->translatedFormat('F o')}}
        </p>
    </div>

    <div class="flex flex-col items-start justify-center col-span-5">
        <p class="title text-4xl text-secondary-content mb-4">
            {{$concert->title}}
        </p>
        @auth
            <a class="text-sm text-black btn btn-sm btn-secondary-content hover:underline mb-4"
                href="{{URL::to('/')}}/admin/concerts/{{$concert->id}}/edit" class="href">Edit</a>
        @endauth
        <p class="text-secondary-content tracking-wider">
            {{$concert->global_event}}
        </p>
        <p class="text-primary tracking-widest text-sm mb-4">
            {{Carbon\Carbon::parse($concert->date)->format('H:i')}}
            | {{$concert->place}}
        </p>
        <p class="text-secondary-content text-sm tracking-wider">
            ΠΡΟΓΡΑΜΜΑ

        </p>
        <p class="text-primary text-sm tracking-normal">
            {{$concert->program}}

        </p>
    </div>
    <div class="col-span-4">
        <figure class="image">
            <img src="{{URL::to('/')}}/{{$concert->image}}" alt="">
        </figure>
    </div>

</div>