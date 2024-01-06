<style>
    .custom-title {
        font-size: 25px;
        margin-left: 50px;
        margin-right: 50px;
        color: white;
    }
</style>

@auth('admin')
    <header class="p-3 bg-dark" style="position: fixed; width: 100%">
        <div class="">
            <div class="d-flex">
                {{-- <a href="/" class="text-decoration-none custom-title">
                Dashboard
            </a> --}}
                <div class="nav col-12 col-lg-auto me-lg-auto"></div>
                <div class="text-end">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-light"
                                style="pointer-events: none; border: transparent">{{ Auth::guard('admin')->user()->username }}</button>
                        </div>
                        <div class="col">
                            <form action="/admin-dashboard/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-light me-2">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endauth
