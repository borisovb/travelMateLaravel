@extends('layouts.app')

@section('content')

<section class="titleSection">
    <p> Stories </p>
</section>

<div class="wrapper">
    <section clas="mainSection">
        @foreach($stories as $story)
        <article class="story">
            <img src="/uploads/storyImages/{{$story->image}}" onmouseover="this.src='/uploads/storyImages/p{{$story->image}}'" onmouseout="this.src='/uploads/storyImages/{{$story->image}}'" />
            <div class="storyContent">
                <h2>{{$story->title}}</h2>
                <p>{{ str_limit($story->content, 100, '...') }}</p>
                <a href="/stories/{{$story->id}}"><button type="button" class="btn btn-light"> <i class="fas fa-caret-square-down"></i> Read More...</button></a>
                <p class="storyDate">
                        <i class="fas fa-calendar"></i> <strong>Date: </strong> {{ date_format(new DateTime($story->created_at),'d M Y') }}
                </p>
            </div>
        </article>
        @endforeach
        {{ $stories->links() }}
    </section>
</div>

@endsection
