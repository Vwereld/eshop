@extends(env('THEME').'.layouts.shop')

@section('navigation')
    {{--@include(......)--}}
    {!! $navigation !!}
@endsection


@section('content')
    {!! $shopProducts !!}
    @endsection

@section('footer')
    @include(env('THEME').'.shop.footer')
    @endsection
