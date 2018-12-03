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

    <section class="mainSection">
        <article class="story">
            <img src="">
            <div class="storyContent">
                <h2> {{ $user->name }}</h2>
                <p><b>Email:</b> {{ $user->email  }}</p>
                <form method="POST" action="/dashboard">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <b>Description:</b>
                    <input type="text" class="form-control" name="description"  value="{{ $user->description }}" /> <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </article>
    </section>




@endsection