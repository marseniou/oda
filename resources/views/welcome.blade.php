<x-layouts.main>
    <x-hero :name="$site_name" :description="$site_description" :image="$image"></x-hero>
    <x-section class="!bg-primary" hashtag="description">


        <div class="grid lg:grid-cols-2 gap-4 p-4 lg:p-8">

            <div class="flex justify-start items-center text-xl text-primary-content p-4 lg:p-8">
                {{$site_description->value}}
            </div>
            <div>
                <figure class="image">
                    <img class="rounded-md" src="https://placehold.co/600x400" alt="">
                </figure>
            </div>

        </div>
    </x-section>

    <x-section class="!bg-base-100" hashtag="musicians">
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 p-2 lg:p-4">
            @foreach ($musicians as $musician)
                <x-musician-card :name="$musician->name" :image="$musician->image"
                    :instrument="$musician->instrument"></x-musician-card>
            @endforeach
        </div>
        <x-custom-button-border text="Όλοι οι Μουσικοί" link="musicians" color="" @class(['text-secondary-content border-secondary-content ml-4'])></x-custom-button-border>


    </x-section>

    <x-section hashtag="next concert" class="bg-blend-overlay" style="background-image:url('{{URL::to('/')}}/cross.png')">
        <x-header title="Επόμενη Συναυλία" class="text-white"></x-header>
        <div class="bg-white mb-12 p-8">
            <x-concert-item :$concert></x-concert-item>
        </div>
        <x-custom-button-border text="Όλες οι Συναυλίες" link="concerts" color="text-primary"></x-custom-button-border>
    </x-section>
</x-layouts.main>