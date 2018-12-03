@extends('layouts.app')

@section('content')

<section class="titleSection">
    <p> {{ $story->title }} </p>
</section>
<img class="storyImage" src="#">
<div class="wrapper">
    <section clas="mainSection">
        <p>{{ $story->content }}</p>
        <strong>Date: </strong> {{ date_format($story->created_at,'d M Y') }}

        <div class="float-right">
            @if (Auth::user()->id == $story->author_id)
            <a href="/stories/{{ $story->id }}/edit"><button type="button" class="btn btn-success">Edit</button></a>
            @endif
        <br>
        </div>
    </section>
</div>

@endsection
