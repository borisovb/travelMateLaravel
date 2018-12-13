@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<section class="titleSection">
    <p> Dashboard </p>
</section>
<div class="container">
        @if($errors->any())
        <br>
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="row">
      <div class="col-sm">
            <br><center><h1>Your profile</h1></center><br>
        <article class="account">

            <img class="circle" src="/uploads/avatars/{{ $user->avatar }}">

            <div class="accountContent">
                    @if ($user->isAdmin)
                    <span class="badge badge-danger">Admin</span>
                    @elseif($user->isEditor)
                    <span class="badge badge-success">Editor</span>
                    @else
                    <span class="badge badge-info">Member</span>
                    @endif<a href="/profile/{{ auth()->user()->id }}"> [View Profile]
                    </a>
                <h2> {{ $user->name }}</h2>
                <p><b>Email:</b> {{ $user->email }}</p>
                <form method="POST" action="/dashboard/avatar" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar"><br><br>
                    <button type="submit" class="btn btn-success">Update Avatar</button>
                </form><br>
                <form method="POST" action="/dashboard">
                    @csrf
                    @method('PATCH')
                    <label>Description</label>
                    <input type="text" class="form-control" style="width:80%" name="description" value="{{ $user->description }}" /> <br>
                    <button type="submit" class="btn btn-success">Update Description</button>
                </form>

            </div>
        </article>
      </div>
      <div class="col-sm">
            <br><center><h1>Your stories</h1></center><br>
        <table class="table">
            <thead class="">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Title</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $story)
                <tr>
                    <th>{{ date_format(new DateTime($story->created_at),'d.m.y') }}</th>
                    <td>{{ $story->title }}
                    @if ($story->approved)
                    <span class="badge badge-success">Approved</span>

                    @else
                    <span class="badge badge-danger">Unapproved</span>

                    @endif

                    </td>
                    <td>
                        <a href="/stories/{{ $story->id }}/edit"><button type="button" class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $stories->links() }}
      </div>
    </div>
  </div>
@endsection
