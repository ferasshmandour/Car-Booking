<x-base-layout>

    <x-slot:title>
        Car Booking
    </x-slot>

    <style>
        .main-img {
            width: 100%;
            height: 700px;
        }

        .car-img {
            width: 100%;
            height: 275px;
        }
    </style>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/download.jpeg') }}" alt="img" class="main-img">
                <div class="container">
                    <div class="carousel-caption text-center">
                        <h1>Car Booking</h1>
                        <p>Book your car now from our amaizing website hahahahahahaha</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Book Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="text-center m-5">Cars Categories</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($categories as $category)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $category->photo) }}" alt="car" class="car-img">
                            <div class="card-body">
                                <p class="card-text">{{ $category->type }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/cars-by-category/{{ $category->id }}"
                                            class="btn btn-sm btn-primary">View
                                            All</a>
                                    </div>
                                    <small class="text-muted">{{ $category->created_at->format('d-M-Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="container marketing text-center" style="margin-bottom: 100px">
        <h1 class="m-5">Our Teams</h1>
        <div class="row">
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                    first column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                    column.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
            </div>
        </div>
    </div>

</x-base-layout>
