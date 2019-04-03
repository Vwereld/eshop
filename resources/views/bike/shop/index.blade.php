@extends(env('THEME').'.layouts.shop')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('sidebar')
    {!! $catItems ?? Null!!}
@endsection
@section('content')
    {!! $shopProducts ?? $itemProducts !!}
    @endsection

@section('footer')
    @include(env('THEME').'.shop.footer')
    @endsection
