<x-layouts.main>
    <div class="container mx-auto lg:w-4/5 xl:w-3/5">
        <div class="mt-8">
            {{ Diglactic\Breadcrumbs\Breadcrumbs::render('blog') }}
        </div>

        @if($posts->count())
            <x-header title="Blog Posts"></x-header>
        @else
            <x-header title="No Posts Yet"></x-header>
        @endif


        @foreach ($posts as $post)
            <x-box>
                <x-post-item :$post></x-post-item>
            </x-box>
        @endforeach

        {{$posts->links()}}
    </div>
</x-layouts.main>