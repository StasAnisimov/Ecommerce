<div class = "row">
<div class = "col-lg-3">
<a href="#"><img src="images/iphone.jpg" alt="" style="width:340px;height:340px;"></a>
<div><h1>{{$product->name}}</h1></div>
<div><p>{{$product->description}}</p></div>
<div>
    <p>${{$product->presentPrice()}}</p>
</div>
</div>