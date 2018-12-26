@extends('app')

<header>
@include('partials.menu')
</header>
<div>
<ul class="product-menu">
    <li><a href="{{route('landing-page')}}"  >Main Page</a></li>
    <li><a href="{{route('shop.index')}}">Shop</a></li>
    <li>{{$product->name}}</li>
</ul>
<div>
<div class = "row">
<div class = "col-lg-3">
<img src="{{ asset('images/'.$product->slug.'.jpg') }}" alt="" style="width:340px;height:340px;">
<form action="{{ route('cart.store') }}" method="POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$product->id}}">
<input type="hidden" name="name" value="{{$product->name}}">
<input type="hidden" name="price" value="{{$product->price}}">
<button class="buy-button" type="submit">BUY</button>
</form>

<div><h1>{{$product->name}}</h1></div>
<div><p>{{$product->description}}</p></div>
<p>${{$product->presentPrice()}}</p>
</div>
</div>
<h2>Might also Like</h2>
    <div class="row">
  
   @include('partials.might-like')
    </div>
