<div class="grid xl:grid-cols-9 gap-2">
    <div
        class="text-center leading-tight col-span-3 xl:col-span-2 py-12 border-b xl:border-r xl:border-b-0 border-primary flex-row justify-center items-center">
        <p class="text-center xl:text-bormal text-primary tracking-wide text-lg">
            {{Carbon\Carbon::parse($concert->date)->translatedFormat('l')}}
        </p>
        <p class="title text-9xl display pb-4 m-2 leading-none">
            {{Carbon\Carbon::parse($concert->date)->format('j')}}
        </p>
        <p class="text-primary tracking-widest text-lg mb-4">
            {{Carbon\Carbon::parse($concert->date)->translatedFormat('F o')}}
        </p>
        @if ($concert->have_ticket)
            <a href="{{$concert->ticket_link}}" class="btn btn-primary btn-sm" target="_blank">Εισιτήρια</a>
        @endif
    </div>
    <div class="col-span-4 p-4">

        <p class="title text-4xl mb-4 text-secondary-content">
            {{$concert->title}}
        </p>
        @auth
            <a class="text-lg text-black btn btn-sm btn-secondary-content hover:underline"
                href="{{URL::to('/')}}/admin/concerts/{{$concert->id}}/edit" class="href">Edit</a>
        @endauth
        <p class="text-secondary-content tracking-wider">
            {{$concert->global_event}}
        </p>

        <p class="text-primary tracking-widest text-lg py-4">
            {{Carbon\Carbon::parse($concert->date)->format('H:i')}}
            | {{$concert->place}}
        </p>
        <p class="text-secondary-content text-lg tracking-wider pb-2">
            ΠΡΟΓΡΑΜΜΑ

        </p>
        <p class="text-primary text-lg tracking-normal mb-4">
            {{$concert->program}}

        </p>


    </div>
    <div class="col-span-3">
        <figure class="image">
            <img src="{{URL::to('/')}}/{{$concert->image}}" alt="">
        </figure>
    </div>
</div>