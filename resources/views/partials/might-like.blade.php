
<div class="row">
@foreach($mightAlsoLike as $product)
    <div class ="col-lg-3">
    <a href="{{route('shop.show',$product->slug)}}"><img src="{{ asset('images/'.$product->slug.'.jpg') }}" alt="" style="width:340px;height:340px;"></a>
    <div><p class="naming">{{$product->name}}<p></div>
    <p class="price">${{$product->presentPrice()}}</p>
    <input type="hidden" value = "{{$mightAlsoLike}}" >
    <form action="{{ route('cart.store') }}" method="POST">
{{csrf_field()}}
<input type="hidden" name="id" value="{{$product->id}}">
<input type="hidden" name="name" value="{{$product->name}}">
<input type="hidden" name="price" value="{{$product->price}}">
<button class="buy-button" type="submit">BUY</button>
</form>
    </div>
    @endforeach
    </div>