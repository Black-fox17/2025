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
    </section>
</div>
@endsection