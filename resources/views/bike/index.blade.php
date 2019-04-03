@extends(env('THEME').'.layouts.site')

@section('navigation')

    {!! $navigation !!}
@endsection

@section('content')
    {!! $content !!}
    @endsection
@section('slider')
    {!! $slider !!}
    @endsection

@section('shop')
    {!! $shopPhotos !!}
    @endsection
@section('footer')
    @include(env('THEME').'.footer')
    @endsection
