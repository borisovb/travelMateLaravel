@extends('layouts.app')

@section('content')

<section class="headerImgSection">
    <div class="headerContainer">
        <img src="{{ asset('img/logo.png') }}" class="gear" />
        <h1>TravelMate</h1>
        <p>Travel from home</p>
    </div>
</section>

<section class="infoSection">
    <div class="infoLeft">
        <img src="{{ asset('img/icons/passport.png') }}" />
        <p>Read interesting stories
            <br> from the around the world</p>
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
        <p>JOIN US</p>
        <button class="button">Login</button>
        <br />
        <button class="button">Register</button>

    </div>
</section>

@endsection

