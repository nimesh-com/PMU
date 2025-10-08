@extends('layouts.BackEnd')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Primary Color Bordered Table -->
<table class="table table-bordered border-primary">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Users as $index => $user)
        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{route('userEdit', $user->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('userDelete', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach


    </tbody>
</table>
<!-- End Primary Color Bordered Table -->
@endsection