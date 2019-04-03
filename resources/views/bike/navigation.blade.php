@if($menu)

    <div class="container">
        <div class="row">
            <div class="responsive-logo"></div>
            <div class="pullcontainer">
                <a href="#" id="pull"><i class="fa fa-bars fa-2x"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <nav>
                        <div style ="left: 340px !important;" class="logo-holder"></div>
                    <ul style="margin-left:-30px !important;" class="clearfix">
                     @include(env('THEME').'.custom_menu_items',['items'=>$menu->roots()])
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endif
