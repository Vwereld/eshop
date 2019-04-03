@if(count($sliders)>0)

<div class="flexslider">
    <ul class="slides">
        @foreach($sliders as $slider)
            <li>
                <div class="flex-twitter-icon" style="background: url({{asset(env('THEME'))}}/img/{{$slider->image}}) no-repeat center center;"></div>
                <h2 class="twitter-post-username">
                    <a href="#">{{$slider->title}}</a> <span>/ 35 min</span>
                </h2>
                <p class="twitter-post">{{$slider->text}}</p>
            </li>
            @endforeach
    </ul>
</div>
@endif
