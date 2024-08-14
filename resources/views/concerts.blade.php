<x-layouts.main>
    <div class="container mx-auto w-96 md:w-2/3 xl:w-3/5">
        <div class="mt-8">
            {{ Diglactic\Breadcrumbs\Breadcrumbs::render('concerts') }}
        </div>
        <x-header title="Συναυλίες" class="!my-4"></x-header>
        @foreach ($concerts as $concert)
            <x-box>
                <x-concert-item :$concert></x-concert-item>
            </x-box>
        @endforeach
        {{$concerts->links()}}
    </div>
</x-layouts.main>