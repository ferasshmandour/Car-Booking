<x-base-layout>

    <x-slot:title>
        Car Booking
    </x-slot>

    <div class="container mt-5 mb-5">

        @if (session('success'))
            <div class="alert alert-success text-center" style="font-size: 20px; margin-bottom: 50px">
                {{ session('success') }}
            </div>
        @endif

        <form action="/cars-by-category/{{ $category->id }}/search" method="GET">
            @csrf
            <div class="row mb-4">
                <div class="col-md-2">
                    <input type="text" name="search" class="form-control">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-secondary">Search</button>
                </div>
            </div>
        </form>

        <div class="row mb-2">
            @if (count($cars))
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
                                        @if ($car->is_booked)
                                            <div class="btn btn-secondary" style="pointer-events: none">Car Booked</div>
                                        @else
                                            <form action="/book-car/{{ $car->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary">Book Now</button>
                                            </form>
                                        @endif
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
            @else
                <div class="container m-5">
                    <h1>No Available Cars</h1>
                </div>
            @endif
        </div>
        <a href="/" class="btn btn-dark">Back</a>
    </div>

</x-base-layout>
