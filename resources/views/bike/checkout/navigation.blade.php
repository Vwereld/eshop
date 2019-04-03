

    @if($menu)

        <div class="container" >
            <div class="row">

                <div class="col-md-8 col-md-offset-2" style="float:right;" >
                    <nav>
                        <ul style="margin-left:100px !important;">
                            @include(env('THEME').'.custom_menu_items',['items'=>$menu->roots()])
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    @endif


