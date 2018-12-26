@extends('app')
<header>
@include('partials.menu')
</header>
<div class = "row">

@foreach($products as $product) 
<div class = "col-lg-3">
<a href="{{route('shop.show', $product->slug)}}"><img src="{{ asset('images/'.$product->slug.'.jpg') }}" alt="" style="width:340px;height:340px;"></a>
<div><h1>{{$product->name}}</h1></div>
<div><p>{{$product->description}}</p></div>
<div>
    <p>${{$product->presentPrice()}}</p>
</div>
</div>
@endforeach
</div>