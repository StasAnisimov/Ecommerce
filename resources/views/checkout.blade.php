@extends('app')

@section('title' , 'Checkout')

@section('extra-css')

@endsection

@section('content')

<div class="container">
<h1>Оформление заказа</h1>
<div class="checkout_section">
<div>
<form action="#">
<h1>Данные заказчика</h1>
    <div class="form-group">
<label for="email">Email Адрес</label>
<input type="email" class="form-control" id="email" name="email" value="">
    </div>
    <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" class="form-control">
        </div>
    <div>
    <label for="form-group"></label>    
    </div>
</div>
</form>
</div>
</div>
</div>