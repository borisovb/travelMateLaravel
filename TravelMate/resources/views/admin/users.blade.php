@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h2>Users</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"><i class="fas fa-user"></i> Name</th>
                        <th scope="col"><i class="fas fa-envelope"></i> Email</th>
                        <th scope="col"><i class="fas fa-mouse-pointer"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{ $user->name }}</th>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/admin/users/{{ $user->id }}/edit"><button type="button" class="btn btn-success">Edit</button></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
