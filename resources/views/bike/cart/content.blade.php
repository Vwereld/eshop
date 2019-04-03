@if(session()->exists('status'))
    <div class="box1 success-box">
        {{ session()->get('status') }}
    </div>
@endif﻿
<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
        <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description">Description</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($cartItems as $item)
            <td class="cart_product">
                <a href="{{route('shop.show',$item->id)}}"><img style="width: 150px; height:150px;margin-right:15px;" src="{{asset(env('THEME'))}}/img/products/{{$models->firstWhere('id', $item->id)->img}}" alt=""></a>
            </td>
            <td class="cart_description">
                <h4><a href="{{route('shop.show',$item->id)}}">{{ $models->firstWhere('id', $item->id)->title }}</a></h4>
                <p><a href="{{route('shop.show',$item->id)}}">{{ $models->firstWhere('id', $item->id)->description }}</a></p>
            </td>
            <td class="cart_price">
                <p>{{$item->price}} €</p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <select>
                        <option selected="">1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
            </td>
            <td class="cart_price">
                <p >{{$item->price}} €</p>
            </td>
            <td class="cart_delete">
                <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">{{csrf_field()}}
                {{method_field('DELETE')}}
                <button style="border: none;" type="submit" class="fa fa-times"></button> </form>
            </td>
        </tr>
@endforeach

        </tbody>
    </table>
</div>
                <div class="checkout-totals-cart">
                    <div class="checkout-totals-left-cart">
                        Subtotal <br/>
                        Tax <br/>
                        <span class="checkout-totals-total">Total</span>
                    </div>
                    <div class="checkout-totals-right-cart">
                        {{{Cart::subtotal()}}}<br/>
                        {{{Cart::tax()}}}<br/>
                        <span class="checkout-totals-total">{{{Cart::total()}}}</span>
                    </div>
                </div>
        <a href="{{route('checkout.index')}}" class="btn btn-success" style="margin-bottom: 20px;margin-left: 40px;">Continue with checkout</a>
