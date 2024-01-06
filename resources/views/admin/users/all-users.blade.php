<x-admin.admin-layout>

    <x-slot:title>
        Users
    </x-slot>

    <style>
        .img-style {
            width: 50px;
            height: 50px;
            border-radius: 30px;
        }
    </style>

    <h1 class="mt-5 mb-3">Users</h1>

    {{-- <a href="/admin-dashboard/add-car" class="btn btn-dark mb-3">Add new car</a> --}}

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    {{-- <td><img src="{{ $car->photo ? asset('storage/' . $car->photo) : 'Image not found' }}" alt="img"
                            class="img-style"></td> --}}
                    <td>
                        <div class="row" style="width: 170px">
                            {{-- <div class="col-md-4 ml-4 mr-4">
                                <a href="/admin-dashboard/edit-car/{{ $car->id }}" class="btn btn-success">Edit</a>
                            </div> --}}
                            <div class="col-md-4 ml-4 mr-4">
                                <form action="/admin-dashboard/delete-user/{{ $user->id }}" method="POST">
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
