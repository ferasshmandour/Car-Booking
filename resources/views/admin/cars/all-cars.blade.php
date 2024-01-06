<x-admin.admin-layout>

    <x-slot:title>
        Cars
    </x-slot>

    <style>
        .img-style {
            width: 50px;
            height: 50px;
            border-radius: 30px;
        }
    </style>

    <h1 class="mt-5 mb-3">Cars</h1>

    <a href="/admin-dashboard/add-car" class="btn btn-dark mb-3">Add new car</a>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Manufacturing Year</th>
                <th scope="col">Price</th>
                <th scope="col">Color</th>
                <th scope="col">Photo</th>
                <th scope="col">Category</th>
                <th scope="col">Created by</th>
                <th scope="col">Booked by</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->manufacturing_year }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->color }}</td>
                    <td><img src="{{ $car->photo ? asset('storage/' . $car->photo) : 'Image not found' }}"
                            alt="img" class="img-style"></td>
                    <td>{{ $car->category->type }}</td>
                    <td>{{ $car->admin->username }}</td>
                    <td>{{ $car->user ? $car->user->name : 'Not booked' }}</td>
                    <td>
                        <div class="row" style="width: 170px">
                            <div class="col-md-4 ml-4 mr-4">
                                <a href="/admin-dashboard/edit-car/{{ $car->id }}" class="btn btn-success">Edit</a>
                            </div>
                            <div class="col-md-4 ml-4 mr-4">
                                <form action="/admin-dashboard/delete-car/{{ $car->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-admin.admin-layout>
