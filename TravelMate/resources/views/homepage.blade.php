@extends('layouts.app')

@section('content')

<section class="headerImgSection">
    <div class="headerContainer">
        <img src="{{ asset('img/logo2.png') }}" class="gear" />
        <h1>TravelMate</h1>
        <p>Travel from home</p>
    </div>
</section>

<section class="infoSection">
    <div class="infoLeft">
        <img src="{{ asset('img/icons/passport.png') }}" />
        <p>Read interesting stories
            <br> from around the world</p>
    </div>
    <div class="infoRight">
        <img src="{{ asset('img/icons/trekking.png') }}" />
        <p>Find new friends
            <br> and share a trip together</p>
    </div>
    <div class="infoCenter">
        <img src="{{ asset('img/icons/around.png') }}" />
        <p>Find useful information about
            <br> travel visas, road taxes and more...</p>
    </div>
</section>

<section class="joinUsSection">
    <div>
        @guest
        <p>JOIN US</p>
        <a href="/login"><button class="button">Login</button></a>
        <br />
        <a href="/register"><button class="button">Register</button></a>
        @else
        <p>TELL US YOUR STORY</p>
        <a href="/stories/create"><button class="button">Submit a story</button></a>
        @endguest
    </div>
</section>

@endsection
