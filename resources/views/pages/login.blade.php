<x-base-layout>

    <x-slot:title>
        Login
    </x-slot>

    <div class="container w-50" style="margin-top: 150px">
        <div class="card" style="padding: 40px">
            <h1 class="mb-5">Login</h1>
            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                @error('email')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                @error('password')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror

                <a href="/sign-up">Register</a>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>

</x-base-layout>
