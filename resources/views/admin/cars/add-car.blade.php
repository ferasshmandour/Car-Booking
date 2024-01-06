<x-admin.admin-layout>

    <x-slot:title>
        Add Car
    </x-slot>

    <h1 class="m-5">Add Car</h1>

    <div class="w-50">
        <form method="POST" action="/admin-dashboard/store-car" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            @error('name')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Manufacturing Year</label>
                <input type="text" name="manufacturing_year" class="form-control">
            </div>
            @error('manufacturing_year')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            @error('price')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control">
            </div>
            @error('color')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            @error('photo')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option selected disabled>Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->type }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <a href="/admin-dashboard/cars" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>

</x-admin.admin-layout>
