
    <div class="col-sm-9 padding-right" style="width: 100%;">

            <h2 class="title text-center">Features Items</h2>
        @if(session()->exists('status'))
            <div class="box1 success-box">
                {{ session()->get('status') }}
            </div>
        @endif﻿
    @foreach($productsItems as $product)
            <div class="features_items"><!--features_items-->
                <div class="col-sm-4">
                    <div id="header-shadow"></div>
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                              <a href="{{ route('shop.show', $product->id) }}"><img style = "width: 200px; height: 200px;" src="{{asset(env('THEME'))}}/img/products/{{$product->img}}" alt="" />
                                </a>
                                <h3>{{$product->title}}</h3>
                                <p>{{str_limit($product->description),20}}</p>
                                <h2>{{$product->price}} € </h2>
                                @if(\Auth::user())
                          <form action="{{route('cart.store')}}" method="POST">{{csrf_field()}}
                              <input type="hidden" name="id" value="{{$product->id}}">
                              <input type="hidden" name="title" value="{{$product->title}}">
                              <input type="hidden" name="price" value="{{$product->price}}">
                          <button type="submit" class="btn button-plain">Add to cart</button></form>
                           @endif
                            </div>
                            </div>
                        </div>

                    </div>
            </div>
    @endforeach
    </div>

