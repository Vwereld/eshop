
@if(isset($categories))

        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <h4 class="panel-title">
                                <div class="input-prepend">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li style="list-style: none; padding-bottom: 5px;">
                                            <a href="{{route('shop.index',['categories' => $category->id])}}"> {{$category->title}}</a>
                                        </li>
                                            @endforeach
                                        <li style="list-style: none; padding-bottom: 5px;">
                                            <a style="text-decoration: none;"href="{{route('shop.index',['categories' => $categories])}}"> <h2 style="margin-left:-35px;">All categories</h2></a>
                                        </li>
                                    </ul>
                                </div>

                            </h4>

                </div><!--/category-products-->


                <h2>Price Range</h2>
                <p>
                    <label for="amount"></label>

                    <input class="price_selector" style="float:left; width: 40px; border: none;" type="text" id="amount_start" name="start_price">
                    <input class="price_selector" style="float: right; width: 40px; border: none;" type="text" id="amount_end" name="end_price" >

                </p>

                <div id="slider-range" style="margin-bottom: 40px;"></div>
            </div>
        </div>


@endif

<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1900,
            values: [ 500, 1000 ],
            slide: function (event, ui) {
                $('#amount_start').val(ui.values[ 0 ]);
                $('#amount_end').val(ui.values[ 1 ]);

                var start = $('#amount_start').val();
                var end = $('#amount_end').val();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        console.log(response);
                        $('#slider-div').html(response)
                    }
                })
            }
        });
    });
</script>
