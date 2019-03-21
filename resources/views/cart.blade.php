@extends('app')
<h1>Корзина</h1>
@if(Cart::count()>0)
<h2>{{Cart::count()}} товар(ов) в корзине</h2>
@else
<h2>Товаров в корзине нет</h2>
@endif

@foreach(Cart::content() as $item)
<p>{{$item->model->presentPrice()}}</p>
<p>{{$item->name}}</p>
<img src="{{ asset('images/'.$item->model->slug.'.jpg') }}" alt="">
<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
{{csrf_field()}}
{{method_field('DELETE')}}
<button type="submit">Удалить товар</button>
</form>
@endforeach
<h3>{{ presentPrice(Cart::subtotal()) }}</h3>
<h3>{{ presentPrice(Cart::tax(2,'.',','))  }}</h3>
<h3>{{ presentPrice(Cart::total()) }}</h3>
<a href="{{route('checkout.index')}}" class="button">Оформить заказ</a>
<a href="{{route('shop.index')}}" class="button-primary">Продолжить покупки</a>

<div>

</div>

@include('partials.might-like')