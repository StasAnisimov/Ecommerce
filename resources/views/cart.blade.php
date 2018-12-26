@extends('app')
<h1>Корзина</h1>
@if(Cart::count()>0)
<h2>{{Cart::count()}} товар(ов) в корзине</h2>
@else
<h2>Товаров в корзине нет</h2>
@endif

@foreach(Cart::content() as $item)
<p>{{$item->price}}</p>
<p>{{$item->name}}</p>
<img src="{{ asset('images/'.$item->model->slug.'.jpg') }}" alt="">
<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
{{csrf_field()}}
{{method_field('DELETE')}}
<button type="submit">Удалить товар</button>
</form>

@endforeach
@if (Cart::instance('saveForLater')->count() > 0) 
<h2>{{Cart::instance('saveForLater')->count()}} товар(ов) сохранено на позже</h2>
@else
<h2>У вас нет сохраненных на позже товаров</h2>
@endif

 

@include('partials.might-like')