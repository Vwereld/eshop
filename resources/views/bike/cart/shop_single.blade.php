@if(session()->exists('status'))
    <div class="box1 success-box">
        {{ session()->get('status') }}
    </div>
@endif﻿
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Discover our special offers</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            <h4 class="panel-title">
                <div class="input-prepend">
                    {{--<ul>--}}
                       <a href="#"> <img style = "width: 100%; height: 550px;" src="{{asset(env('THEME'))}}/img/7c561667f6d6298030c74add6d879ddf.jpg" alt="" />
                       </a>
<div style="padding: 65px;"> <a href="{{route('shop.index')}}" class="btn btn-default">Back to shopping</a></div>


                </div>

            </h4>


        </div><!--/category-products-->
    </div>
</div>

    <div class="col-sm-9 padding-right">
        <div class="input-prepend" style="margin-top:15px; margin-right: 25px;">
        </div>
    </div>
    <div class="col-sm-9 padding-right">

            <h2 class="title text-center">Description</h2>

@if($product)
            <div class="features_items">
                <div class="col-sm-12">
                    <div id="header-shadow"></div>
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                              <img style = "width: 60%; height: 60%;" src="{{asset(env('THEME'))}}/img/products/{{$product->img}}" alt="" />
                                <h3>{{$product->title}}</h3>
                                <p>{{$product->description}}</p>
                                <h2>{{$product->price}} € </h2>
                                <form action="{{route('cart.store')}}" method="POST">{{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <button type="submit" class="btn button-plain">Add to cart</button></form>
                            </div>
                            </div>
                        </div>

                    </div>
            </div>
    @endif

    </div>
