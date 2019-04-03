@if($portfolios)
    @foreach($portfolios as $k=>$item)
        @if($k == 0)
            <div class="container-fluid intro" id="about">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="chain">{{$item->title}}</h1>
                        <p class="text-intro">{!!  $item->text!!}</p>
                    </div>
                </div>
            </div>
            @endif
        @if($k == 1)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 section-1 nopadding" id="work">
                    {{--@if($portfolio->title ="VINTAGE OLIVA")--}}
                    <div class="logo-1 wp1"></div>
                </div>
                <div class="col-md-4 section-text nopadding">
                    <div class="wp4">
                        <h2 class="frame">{!! $item->title !!}</h2>
                        <p>{!! $item->text !!}</p>
                        <div class="thin-sep"></div>
                    </div>
                    <div class="small-featured-img seat-red"  style="background: url({{asset(env('THEME'))}}/img/{{$item->img}}) no-repeat center center; background-size: cover;">
                        <div class="arrow"></div>
                    </div>
                </div>
            </div>
            @endif
            @if($k==2)
            <div class="row">
                <div class="col-md-4 section-text nopadding">

                    <div class="wp5">
                        <h2 class="mech">{!! $item->title !!}</h2>
                        <p>{!! $item->text !!}</p>
                        <div class="thin-sep"></div>
                    </div>
                    <div class="small-featured-img seat-black" style="background: url({{asset(env('THEME'))}}/img/{{$item->img}}) no-repeat center center; background-size: cover;">

                        <div class="arrow"></div>
                    </div>
                </div>
                <div class="col-md-8 section-2 nopadding">
                    <div class="logo-2 wp2"></div>
                </div>
            </div>
            @endif
            @if($k==3)
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4 section-3">
                    <div class="logo-3 wp3"></div>
                </div>
                <div class="col-md-4 section-text nopadding">
                    <div class="wp6">
                        <h2 class="front-frame">{!! $item->title !!}</h2>
                        <p>{!! $item->text !!}</p>
                        <div class="thin-sep"></div>
                    </div>
                    <div class="small-featured-img frame-red" style="background: url({{asset(env('THEME'))}}/img/{{$item->img}}) no-repeat center center; background-size: cover;">
                        <div class="arrow"></div>
                    </div>
                </div>
                <div class="col-md-4 section-4"></div>
            </div>
            @endif
        </div>
        @endforeach
    @endif


