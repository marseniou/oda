<x-layouts.main>
    <x-section hashtag="musician" class="!bg-base-100">
        <x-header :title="$musician->name"></x-header>
        <x-box class="p-4">
            <div class="flex flex-col justify-center items-center">
                <div class="lg:grid lg:grid-cols-9 gap-8">
                    <div class="lg:col-span-3">
                        <img class="rounded p-2 border shadow-xl" src="{{URL::to('/')}}/{{$musician->image}}" alt="">
                        <div class="text-primary title mt-2 text-center">{{$musician->instrument}}</div>
                        </div> 
                    <div class="lg:col-span-6">
                    
                    <div class="leading-7">{!!$musician->bio!!}</div>
                    </div>
                </div>
            </div>
        </x-box>
    </x-section>


</x-layouts.main>