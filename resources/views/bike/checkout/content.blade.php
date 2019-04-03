
    <script src="https://js.stripe.com/v3/"></script>

@if(session()->exists('status'))
    <div class="box1 success-box">
        {{ session()->get('status') }}
    </div>
@endif﻿

@if(count($errors)>0)
    <div class="r_spacer"></div>
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
    </div>
    @endif
<div class="container">
<div class="shopper-informations">
    <div class="row">
        <div class="col-sm-4" style="padding: 40px;">
            <div class="form-one">
                <h3>Payment details</h3>
                <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email"> Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="address"> Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" required>
                    </div>
                    <div class="form-group" >
                        <label for="postalcode" > Postal code</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{old('postalcode')}}" style="width:40% !important;" required>&nbsp;
                    </div>
                    <div class="form-group" >
                        <label for="phone"> Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" style="width:40% !important;" required>
                    </div>
                    <div class="form-group">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                    </div>
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <button id="complete-order" type="submit" class="btn btn-success">Complete order</button>
                </form>

            </div>
        </div>
        <div class="col-sm-7" style="margin-left: 70px;">
        <div class="checkout-table">
            <h3 style="text-align: center;">Your order:</h3>
            @foreach($cartItems as $item)
                <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <a href="{{route('shop.show',$item->id)}}"><img style="width: 250px; height:200px;margin-right:15px;" src="{{asset(env('THEME'))}}/img/products/{{$models->firstWhere('id', $item->id)->img}}" alt=""></a>
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">  <h3 style="font-weight: bold;"><a href="{{route('shop.show',$item->id)}}">{{ $models->firstWhere('id', $item->id)->title }}</a></h3>
                            </div>
                            <div class="checkout-table-description"><a href="{{route('shop.show',$item->id)}}">{{ str_limit($models->firstWhere('id', $item->id)->description ),530}}</a>
                            </div>
                            <div class="checkout-table-price">Price:{{$item->price}} €</div>
                            <div class="checkout-table-price">Quantity: {{$item->qty}} pc's</div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="checkout-totals">
            <div class="checkout-totals-left">
                Subtotal <br/>
                Tax <br/>
                <span class="checkout-totals-total">Total</span>
            </div>
            <div class="checkout-totals-right">
                {{{Cart::subtotal()}}}<br/>
                {{{Cart::tax()}}}<br/>
                <span class="checkout-totals-total">{{{Cart::total()}}}</span>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
    <script>

    // Create a Stripe client.
    var stripe = Stripe('pk_test_7UWgtM5wFkHdqP4EygTBHbzx');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Roboto", "Helvetica Neue", Helvetica, sans-serif',
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
    var card = elements.create('card', {style: style,
        hidePostalCode: true});

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
        document.getElementById('complete-order').disabled = true;

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                document.getElementById('complete-order').disabled = false;
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
    </script>
<script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
