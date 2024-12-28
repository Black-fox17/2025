@extends('layouts.whole')

@section('title')
    Fashion Products
@endsection

@section('content')
<div>
    <a href = "{{ url()->previous() }}">
        <div class = "back-btn">
            <img src = "{{ asset('icons/back.svg')}}">
        </div>
    </a>
    <div class="fas-container">
        <h3 class="products-head">Fashion Products</h3>
        <p class="descr">Designed for ultimate performance on the slopes, Loro Piana’s Ski Capsule presents a wardrobe for life lived en plein air. From skiwear to a handcrafted snowboard, the lineup showcases how the noblest of natural fibres are refined through the Maison’s endless quest for textile innovation.</p>
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="card mb-4">
                    <a href = "{{ route('product.show', ['id' => $product['id']]) }}">
                            <img 
                                src="{{ asset($product['image_url']) }}" 
                                class="card-img-top" 
                                alt="{{ $product['name'] ?? 'Product Image' }}">
                                <h3 >{{ $product['name'] }}</h5>
                                <p class="card-text">{{ $product['description'] }}</p>
                                <p class="price">${{ number_format($product['price'], 2) }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
 @endsection