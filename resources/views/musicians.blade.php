<x-layouts.main>
    <x-section hashtag="all_musicians" class="!bg-base-100">
        <x-header title="Οι Μουσικοί της Ορχήστρας Δωματίου Αλεξανδρούπολης"></x-header>
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 p-2 lg:p-4">
            @foreach ($musicians as $musician)
                <x-musician-card :name="$musician->name" :image="$musician->image" :instrument="$musician->instrument"
                    :slug="$musician->slug"></x-musician-card>
            @endforeach
        </div>
    </x-section>
</x-layouts.main>