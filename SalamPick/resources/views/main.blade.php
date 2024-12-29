@extends('layouts.whole')

@section('title')
    Salam's Pick
@endsection

@section('content')
<div>
    <div class="video-container">
        <video class = "picture-teaser__media" autoplay loop muted>
            <source src="Videos/brabus.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class = "intro">
        <p>
            Welcome to Salam's Picks! Here are some products that tells my story from my favorite brands.
        </p>
        <h2 class="main-head" id = "section">Choose a section to navigate!</h3>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="#fashion">Fashion</a></li>
            <li><a href="#tech">Tech Pieces</a></li>
            <li><a href="#autos">Autos</a></li>
            <li><a href="#food">Food</a></li>
        </ul>
    </nav>
    <section id = "fashion" class="fas-container">
        <h2 class="fashion-head">Fashion</h2>
        <p class="disco"><a href="{{ route('products') }}">Discover more </a></p>
        <a href="{{ route('products') }}">
        <div class="fas-img-container">
        <img class="img-container" src="{{ asset('images/lp-apres-ski-80-main-1080x1350-11-.jpg') }}">
            <div class="four-images">
                <img src="{{ asset('images/lp-fw2024-main-1080x1350-28-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-15-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-1-.jpg') }}">
                <img src="{{ asset('images/lp-apres-ski-80-main-1080x1350-12-.jpg') }}">
            </div>
        </div>
        </a>
        <p class="disco"><a href="{{ route('products') }}">Check out more </a></p>
    </section>
    <section id = "tech" class="fas-container">
        <h2 class="fashion-head">Tech pieces</h2>
        <p class="disco"><a href="{{ route('products') }}">Discover more </a></p>
        <a href="{{ route('products') }}">
        <div class="fas-img-container">
        <img class="img-container" src="{{ asset('images/lp-apres-ski-80-main-1080x1350-11-.jpg') }}">
            <div class="four-images">
                <img src="{{ asset('images/lp-fw2024-main-1080x1350-28-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-15-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-1-.jpg') }}">
                <img src="{{ asset('images/lp-apres-ski-80-main-1080x1350-12-.jpg') }}">
            </div>
        </div>
        </a>
        <p class="disco"><a href="{{ route('products') }}">Check out more </a></p>
    </section>
    <section id = "autos" class="fas-container">
        <h2 class="fashion-head">Autos</h2>
        <p class="disco"><a href="{{ route('products') }}">Discover more </a></p>
        <a href="{{ route('products') }}">
        <div class="fas-img-container">
        <img class="img-container" src="{{ asset('G800_ Superblack elephant studio klein  (4)-1920x1080.jpg') }}">
            <div class="four-images">
                <img src="{{ asset('cars/esh.png') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-15-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-1-.jpg') }}">
                <img src="{{ asset('images/lp-apres-ski-80-main-1080x1350-12-.jpg') }}">
            </div>
        </div>
        </a>
        <p class="disco"><a href="{{ route('products') }}">Check out more </a></p>
    </section>
    <section id = "food" class="fas-container">
        <h2 class="fashion-head">Food</h2>
        <p class="disco"><a href="{{ route('products') }}">Discover more </a></p>
        <a href="{{ route('products') }}">
        <div class="fas-img-container">
        <img class="img-container" src="{{ asset('images/lp-apres-ski-80-main-1080x1350-11-.jpg') }}">
            <div class="four-images">
                <img src="{{ asset('images/lp-fw2024-main-1080x1350-28-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-15-.jpg') }}">
                <img src="{{ asset('images/lp-evening-1080x1350-1-.jpg') }}">
                <img src="{{ asset('images/lp-apres-ski-80-main-1080x1350-12-.jpg') }}">
            </div>
        </div>
        </a>
        <p class="disco"><a href="{{ route('products') }}">Check out more </a></p>
    </section>
</div>
@endsection