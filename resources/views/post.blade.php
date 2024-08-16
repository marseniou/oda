<x-layouts.main>
    <div class="container mx-auto w-96 md:w-2/3 xl:w-3/5">
    <div class="mt-8">
            {{ Diglactic\Breadcrumbs\Breadcrumbs::render('post', $post) }}
            <x-header :title="$post->title"></x-header>
        </div>
        <x-box class="xl:!px-64">

            

            <figure class="image mb-8">
                <img src="{{URL::to('/')}}/{{$post->featured_image}}" alt="">
            </figure>
            <div class="text-sm mb-2 text-primary tracking-wide italic underline text-r">
            {{\Carbon\Carbon::parse($post->published_at)->translatedFormat('j F o')}}
            </div>
            {!!$post->description!!}

        </x-box>
        
    </div>
</x-layouts.main>