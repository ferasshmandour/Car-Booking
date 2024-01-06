<x-base-layout>

    <x-slot:title>
        Car Booking
    </x-slot>

    <div class="container mt-5 mb-5">
        <div class="row mb-2">
            @foreach ($cars as $car)
                @if ($car->category->id === $category->id)
                    <div class="col-md-6">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">{{ $car->category->type }}</strong>
                                <h3 class="mb-2">{{ $car->name }}</h3>
                                <div class="mb-2 text-muted">{{ $car->manufacturing_year }}</div>
                                <p class="card-text mb-auto">{{ $car->color }}</p>
                                @auth
                                    <a href="#" class="btn btn-secondary">Book</a>
                                @endauth
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <img src="{{ $car->photo ? asset('storage/' . $car->photo) : 'Image not found' }}"
                                    alt="img" style="width: 350px; height: 300px">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <a href="/" class="btn btn-dark">Back</a>
    </div>

</x-base-layout>
