@extends('app')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
<div>
                            <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}" >
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }} >{{ $i }}</option>
                                @endfor
                            </select>
                            <h2>Количество {{ $item->quantity }}</h2>
                        </div>
                        <div>{{presentPrice($item->subtotal)}}</div>
                        
@endforeach

<h3>{{ presentPrice(Cart::subtotal()) }}</h3>
<h3>{{ presentPrice(Cart::tax(2,'.',','))  }}</h3>
<h3>{{ presentPrice(Cart::total()) }}</h3>
<a href="{{route('checkout.index')}}" class="button">Оформить заказ</a>
<a href="{{route('shop.index')}}" class="button-primary">Продолжить покупки</a>

<div>

</div>
@include('partials.might-like')

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection

