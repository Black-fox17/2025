@extends('layouts.whole')

@section('title')
    {{$product['name']}}
@endsection

@section('content')
<div>
    <div class= "product-container">
        <div class = "image-container">
            <img src="{{ asset($product['image_url']) }}"  alt="Product Image" class="product-image">
        </div>
        <div class = "product-info">
            <h2 class = "title">{{$product['name']}}</h2>
            <span>
            <p class="price">${{ number_format($product['price'], 2) }}</p>
            </span>
            <div class="personal-reason">
                <h3>Why I Want This Product</h3>
                <p>{{$product['why_want_product']}}</p>
            </div>
        </div>
        <div class="buyer-info">
            <div class="info">
                <p><strong>Sold by</strong></p>
                <a href= "https://www.hermes.com/us/en/product/icone-loafer-H242169Zv4N360/"><p>{{$product['sold_by']}}</p></a>
            </div>
            <br>    
            <div class="color">
                <p>Color</p>
                <p class="type">{{$product['color']}}</p>
            </div>
            <p class="description">{{$product['description']}}</p>
            <p class="description">Made in {{$product['made_in']}}</p>
            <div class="btn-buy">
                <button 
                    class="add-cart" 
                    data-id="{{ $product['id'] }}" 
                    data-name="{{ $product['name'] }}" 
                    data-price="{{ $product['price'] }}" 
                    data-image="{{ $product['image_url'] }}">
                    Add to Cart
                </button>
            </div>
            <div class="btn-buy">
                <a href = "{{ route('buy') }}" class="add-link">
                    <button  class="add-to-cart">Buy Now </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection