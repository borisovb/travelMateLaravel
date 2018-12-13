@extends('layouts.app')

@section('content')

<section class="titleSection">
    <p> {{ $story->title }} </p>
</section>
<img class="storyImage" src="/uploads/storyImages/{{$story->image}}">
<div class="wrapper">
    <section clas="mainSection">
        <p>{{ $story->content }}</p>
        <i class="fas fa-calendar"></i> <strong>Date: </strong> {{ date_format($story->created_at,'d M Y') }}

        <div class="float-right">
            <i class="fas fa-pencil-alt"></i> <strong>Author: </strong>{{$user->name}} <br>
            @can('manage', $story)
            <a href="/stories/{{ $story->id }}/edit"><button type="button" class="btn btn-success"> <i class="fas fa-edit"></i> Edit</button></a>
            @endcan
            <br><br>
        </div>
    </section>
</div>

@endsection
