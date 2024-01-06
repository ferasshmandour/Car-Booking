<x-admin.admin-layout>

    <x-slot:title>
        Edit Car
    </x-slot>

    <style>
        .car-img {
            width: 400px;
            height: 400px;
        }
    </style>

    <h1 class="m-5">Edit Car</h1>

    <div class="w-50">
        <form method="POST" action="/admin-dashboard/update-car/{{ $car->id }}" enctype="multipart/form-data"
            style="margin-bottom: 100px">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $car->name }}">
            </div>
            @error('name')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Manufacturing Year</label>
                <input type="text" name="manufacturing_year" class="form-control"
                    value="{{ $car->manufacturing_year }}">
            </div>
            @error('manufacturing_year')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $car->price }}">
            </div>
            @error('price')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control" value="{{ $car->color }}">
            </div>
            @error('color')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <label class="form-label">Photo</label>
            <div class="mb-3">
                <img src="{{ $car->photo ? asset('storage/' . $car->photo) : 'Image not foun' }}" alt="img"
                    class="car-img">
                <input type="file" name="photo" class="form-control" value="{{ $car->photo }}">
            </div>
            @error('photo')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="{{ $car->category->id }}" selected>{{ $car->category->type }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->type }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')
                <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
            @enderror

            <a href="/admin-dashboard/cars" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

</x-admin.admin-layout>
