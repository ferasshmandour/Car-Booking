<style>
    .custom-title {
        font-size: 25px;
        margin-left: 50px;
        margin-right: 50px;
        color: white;
    }
</style>

<header class="p-3 bg-dark">
    <div class="">
        <div class="d-flex">
            <a href="/" class="text-decoration-none custom-title">
                Car Booking
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                {{-- <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>

            {{-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..."
                    aria-label="Search">
            </form> --}}

            <div class="text-end">
                @auth('web')
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-light"
                                style="pointer-events: none; border: transparent">{{ Auth::guard('web')->user()->name }}</button>
                        </div>
                        <div class="col">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/sign-in" class="btn btn-outline-light">Login</a>
                    <a href="/sign-up" class="btn btn-warning">Register</a>
                @endauth
            </div>
        </div>
    </div>
</header>
