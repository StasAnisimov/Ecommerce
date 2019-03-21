


@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div class = "check-table">
@foreach (Cart::content() as $item)
<img src = "{{asset ('images/'.$item->model->slug.'.jpg')}}">
    <div class="item-name">{{$item->model->name}}</div>
    <div class="item-desription">{{$item->model->details}}</div>
    <div class="item-quantity">{{$item->model->presentPrice()}}</div>
    <h1></h1>
@endforeach
</div>
<h3>Сумма заказа {{presentPrice(Cart::subtotal())}}</h3>
<div class="container">
<h1>Оформление заказа</h1>
<div class="checkout_section">
<div>
<form action="{{route('checkout.store')}}" method="POST">
{{csrf_field()}}
<h1>Данные заказчика</h1>
    <div class="form-group">
<label for="email">Email Адрес</label>
<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
    </div>
    <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" class="form-control"id="name" value="{{old('name')}}" required>
        </div>
    <div>
   
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>

</div>
</form>
</div>
</div>
</div>

<script>
(function(){
    var stripe = Stripe('pk_test_StBPkRpCjV6SuOBlJbT0VLsz00sJGzVfCe');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
})()
</script>
