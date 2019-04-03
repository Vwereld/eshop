@foreach($items as $item)
<li>
    @if($item->title == 'Our works')
        <a style ="margin-right: 260px !important;"></a>
        @endif
    <a  href="{{$item->url()}}">{{$item->title}}</a>
</li>
    @endforeach
