@extends('layouts.app')

@section('content')


    <section class="titleSection">
        <p>  {{ $user->name }}'s Profile </p>
    </section>

<div class="wrapper">
    <section class="mainSection">
        <article class="story">
            <img src="">
            <div class="storyContent">
                <p><b>Email:</b> {{ $user->email  }}</p>
                <p><b>Description:</b> {{ $user->description  }}</p>
            </div>
        </article>
    </section>
</div>



@endsection