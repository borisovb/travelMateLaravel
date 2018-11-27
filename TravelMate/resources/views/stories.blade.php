@extends('layouts.app')

@section('content')

    <section class="titleSection">
        <p> Stories </p>
    </section>

    <div class="wrapper">
        <section clas="mainSection">
            <@foreach($stories as $story)
            <article class="story">
                <img src="">
                <div class="storyContent">
                    <h2>{{$story->title}}</h2>
                    <p>{{ str_limit($story->content, 100, '...') }}</p>
                    <a href="/stories/{{$story->id}}">Read more...</a>
                    <p class="storyDate">
                        <strong>Date: </strong> {{ $story->created_at }} </p>
                </div>
            </article>
            @endforeach
        </section>
    </div>

@endsection

