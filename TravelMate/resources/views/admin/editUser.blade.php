@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h2>Users</h2>
            <form method="POST" action="/admin/users/{{$user->id}}/edit">
                @method('PATCH')
                @csrf
                <div class="col-10">

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input class="form-control" type="text" placeholder="Username" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Email</label>
                        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="isEditor" name="isEditor" @if ($user->isEditor)
                            checked
                        @endif>
                        <label class="form-check-label" for="exampleCheck1">Editor</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="isAdmin" name="isAdmin" @if ($user->isAdmin)
                        checked
                    @endif>
                        <label class="form-check-label" for="exampleCheck1">Admin</label>
                    </div>
                    <div class="form-group">
                        <div class="offset-sm-12 col-sm-6">
                            <button type="submit" class="btn btn-success"> <i class="fas fa-edit"></i> Update User</button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="/admin/users/{{ $user->id }}/delete">
                @method('DELETE')
                @csrf
                <div class="col-10">
                    <div class="form-group">
                        <div class="offset-sm-12 col-sm-6">
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> Delete</button>
                        </div>
                    </div>
                </div>
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
    </div>
</div>

@endsection
