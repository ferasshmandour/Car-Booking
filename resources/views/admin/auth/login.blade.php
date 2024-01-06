<x-admin.admin-layout>

    <x-slot:title>
        Login
    </x-slot>

    <h1 class="m-5">Login</h1>

    <div class="w-50">
        <form method="POST" action="/admin-dashboard/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            @error('username')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            @error('password')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>

</x-admin.admin-layout>
