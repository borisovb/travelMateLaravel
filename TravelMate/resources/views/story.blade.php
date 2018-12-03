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
        <br><br>
    </section>
</div>

@endsection
