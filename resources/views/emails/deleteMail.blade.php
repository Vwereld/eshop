<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mail</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="col-md-12" style="
    height: 50px;
    width: 100%;
    background-color: #999;"></div>
<img src="{{ $message->embed('images/inovim_logo-small.png') }}" width='180px' style='padding:1rem !important;'>
<h1 style="text-align: center;">Employee with Id#
    <span style="font-weight:bold;text-decoration: underline;">  {{$employeeId}} {{$firstName}} {{$lastName}}</span>
    have been deleted from staff list, check database please.
</h1>
<h2 style="text-align: center;"> Date of ending:
    {{$endDateData}}
    @if($commentData) with comment: {{$commentData}}
    @endif
</h2>
<div class="col-md-12" style="border-top: 1px solid #ccc;">
    <p style="text-align:left; font-size:14px; font-style:italic;">© INOVIM 2018</p>
</div>
</body>
</html>
