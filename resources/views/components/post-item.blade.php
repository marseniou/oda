<div class="grid md:grid-cols-2 gap-8">
    <div>
        <a href="{{route('post', $post->slug)}}" class="title text-3xl hover:underline">{{$post->title}}</a>
        <div class="text-sm my-8 mb-2 underline text-primary tracking-wide italic">
            {{\Carbon\Carbon::parse($post->published_at)->translatedFormat('j F o')}}
        </div>
        <div>{!! $post->excerpt !!}</div>
    </div>
    <div>
        <figure class="image">
            <img src="{{URL::to('/')}}/{{$post->featured_image}}" alt="">
        </figure>
    </div>
</div>