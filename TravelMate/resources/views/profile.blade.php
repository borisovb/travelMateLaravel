@extends('layouts.app')

@section('content')

<section class="titleSection">
    <p> {{ $user->name }}'s Profile </p>
</section>

<div class="wrapper">
    <section class="mainSection">
        <article class="account">
            <img class="circle" src="/uploads/avatars/{{ $user->avatar }}">
            <div class="accountContent">
                @if ($user->isAdmin)
                <span class="badge badge-danger">Admin</span>
                @elseif($user->isEditor)
                <span class="badge badge-success">Editor</span>
                @else
                <span class="badge badge-info">Member</span>
                @endif
                <p><i class="fas fa-envelope"></i> <b>Email:</b> {{ $user->email }}</p>
                <p><i class="fas fa-info-circle"></i> <b>Description:</b> <br> {{ $user->description }}</p>
            </div>
        </article>
    </section>
</div>

@endsection
