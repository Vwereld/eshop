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
    <link href="{{asset(env('THEME'))}}/css/queries.css?v=1.2" rel="stylesheet">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/flexslider.css?v=1.2" type="text/css">
    <link rel="stylesheet" href="{{asset(env('THEME'))}}/css/animate.css" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
  {{--begin navigation--}}
    @yield('navigation')
    {{--end navigation--}}
    <div class="hero"></div>
</header>

@yield('content')
<section class="flex-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              @yield('slider')
            </div>
        </div>
    </div>
</section>
@yield('shop')

<section class="sign_up">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 sign-up">
                <h2 class="logo-header">Stay on the saddle!</h2>
                <form name="signup-form">
                    <input class="signup-input" type="email" name="email_address" value="" placeholder="enter your email..." title="Please enter a valid email address." required>
                    <button type="submit" class="submit-btn">GO</button>
                </form>
            </div>
        </div>
    </div>
</section>
@yield('footer')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset(env('THEME'))}}/js/bootstrap.min.js"></script>
<script src="{{asset(env('THEME'))}}/js/jquery.flexslider.js"></script>
<script src="{{asset(env('THEME'))}}/js/scripts.js"></script>
<script src="{{asset(env('THEME'))}}/js/modernizr.js"></script>
<script src="{{asset(env('THEME'))}}/js/waypoints.min.js"></script>
</body>
</html>
