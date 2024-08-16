<x-layouts.main>
    
    <div class="container mx-auto w-2/5">
        <x-header title="Επικοινωνία"></x-header>
        <x-box>
            <form action="/contact" method="POST" style="display:block">
            @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <div class="label-text">Το email σας

                            <input type="email" placeholder="email" class="input input-bordered w-full"
                                name="email" required />
                        </div>
                    </div>
                </label>
                <label class="form-control w-full max-w-xl">
                    <div class="label">
                        <div class="label-text">Το email σας

                            <textarea type="text" placeholder="email" class="input input-bordered w-full max-w-xl"
                                name="emai" required></textarea>
                        </div>
                    </div>
                </label>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </x-box>
        </div>
</x-layouts.main>