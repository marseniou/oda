<div class="grid md:grid-cols-2 gap-8">
    <div>
        <a href="{{route('post', $post->slug)}}" class="title text-3xl hover:underline">{{$post->title}}</a>
        <div class="text-sm my-8 mb-2 underline text-primary tracking-wide italic text-right">
            {{\Carbon\Carbon::parse($post->published_at)->translatedFormat('j F o')}}
        </div>
        <div class="mb-4">{!! $post->excerpt !!}</div>
        @auth
            <a class="text-sm text-black btn btn-sm btn-secondary-content hover:underline" href="{{URL::to('/')}}/admin/posts/{{$post->id}}/edit"
                class="href">Edit post</a>
        @endauth
    </div>
    <div>
        <figure class="image">
            <img src="{{URL::to('/')}}/{{$post->featured_image}}" alt="">
        </figure>
    </div>
</div>