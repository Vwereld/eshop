
<div class="container-fluid" id="shop">
    <div class="row">
        <div id="effect" class="effects clearfix">
            <div class="col-md-4 left nopadding">
                @foreach($shopitems as $k=>$item)
                @if($k==0)
                <div class="left-box-1">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Leather Seats">
                        <div class="overlay">
                            <a href="http://google.com/" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                    @continue
                @endif
                @if($k==1)
                <div class="left-box-2 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Custom Seats">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                        @continue
                    @endif
                @if($k==2)
                <div class="left-box-btm box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Limited Edition">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mid nopadding">
                @continue
                @endif
                @if($k==3)
                <div class="mid-box-1 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Shop Bags">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                    @continue
                @endif
                @if($k==4)
                <div class="mid-box-2 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Shop Bikes">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 right nopadding">
                @continue
                @endif
                @if($k==5)
                <div class="right-box-1 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Shop Now">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                    @continue
                @endif
                @if($k==6)
                <div class="right-box-2 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Shop Seats">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                        @continue
                @endif
                @if($k==7)
                <div class="right-box-3 box">
                    <div class="img">
                        <img src="{{asset(env('THEME'))}}/img/{{$item->img}}" alt="Shop Accessories">
                        <div class="overlay">
                            <a href="#" class="expand">{{$item->title}}</a>
                            <a class="close-overlay hidden">x</a>
                        </div>
                    </div>
                </div>
                    @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
<section class="discover">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="{{route('shopIndex')}}" class="shop-btn">Discover The Shop</a>
            </div>
        </div>
    </div>
</section>
