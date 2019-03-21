<ul class="main-menu">
    <li><a href="{{route('landing-page')}}" class="menu-links">Home</a></li>
    <li><a href="{{route('shop.index')}}" class="menu-links">Shop</a></li>
    <li><a href="{{route('cart.index')}}" class="menu-links">Cart ({{Cart::count()}})</a></li>
   
</ul>