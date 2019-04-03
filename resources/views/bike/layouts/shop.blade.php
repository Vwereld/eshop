<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(env('THEME'))}}/img/Iconsmind-Outline-Funny-Bicycle.ico" />
    <!-- Bootstrap -->
    <link href="{{asset(env('THEME'))}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset(env('THEME'))}}/css/styles.css" rel="stylesheet">
    <link href="{{asset(env('THEME'))}}/css/styles.css?v=1.2" rel="stylesheet">
    <link href="{{asset(env('THEME'))}}/css/customStyles.css" rel="stylesheet">
    <link href="{{asset(env('THEME'))}}/css/queries.css?v=1.2" rel="stylesheet">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/flexslider.css?v=1.2" type="text/css">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/animate.css" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https/resources/demos/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--Plugin CSS file with desired skin-->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>--}}

    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>



    <![endif]-->
    {{--@yield('extra-css')--}}
</head>
<body>
<header>
    <div class="container" style="float: right;">
        <div class="row">
            <div class="responsive-logo"></div>
            <div class="pullcontainer">
                <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
            </div>
        </div>
        @yield('navigation')
    </div>

    <div class="navTop"></div>

</header>

<section>
    <div class="container">
        <div class="row">
@yield('sidebar')

           @yield('content')
        </div>
    </div>
</section>

                @yield('footer')
{{--@yield('extra-js')--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset(env('THEME'))}}/js/bootstrap.min.js"></script>
<script src="{{asset(env('THEME'))}}/js/jquery.flexslider.js"></script>
<script src="{{asset(env('THEME'))}}/js/scripts.js"></script>
<script src="{{asset(env('THEME'))}}/js/modernizr.js"></script>
<script src="{{asset(env('THEME'))}}/js/waypoints.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--<script src="{{asset(env('THEME'))}}/js/ion.rangeSlider-master/js/ion.rangeSlider.js"></script>--}}
</body>
</html>
