
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class = "row">
@foreach($products as $product) 
<div class = "col-lg-3">
<a href="#"><img src="images/iphone.jpg" alt="" style="width:340px;height:340px;"></a>
<div><h1>{{$product->name}}</h1></div>
<div><p>{{$product->description}}</p></div>
<div>
    <p>${{$product->presentPrice()}}</p>
</div>
</div>
@endforeach
</div>