<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Product;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class IndexController extends ShopController
{
protected $cat_rep;

    public function __construct(CategoriesRepository $cat_rep, ProductsRepository $prod_rep)
    {
        parent::__construct();
        $this->cat_rep = $cat_rep;
        $this->prod_rep = $prod_rep;
        $this->template = env('THEME').'.shop.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(request()->ajax() && isset(request()->start) && isset(request()->end))
        {
            $start = request()->start;
            $end = request()->end;
            $productsItems = DB::table('products')
                ->where('price', '>=', $start)
                ->where('price','<=', $end)
                ->orderBy('price','ASC')
                ->get();

              response()->json($productsItems);
            return view(env('THEME').'.shop.content_by_price', compact('productsItems'))->with('productItems',$productsItems)->render();
        }

        if(request()->categories){
                    $products = Product::with('categories')->whereHas('categories',
                        function ($query){
                        $query->where('categories.id',request()->categories);
                        })->paginate(Config::get('settings.paginate'));
            $categories = $this->getCategory();
            $filters = $this->getProductFilter();
        }
        else{
            $categories = $this->getCategory();
            $products = $this->getProducts();
            $filters = $this->getProductFilter();
        }
        $this->title = 'Our shop';
        $catItems = view(env('THEME').'.shop.sidebar')->with('categories',$categories)->render();
        $this->vars = array_add($this->vars,'catItems',$catItems);
        $shopProducts = view(env('THEME').'.shop.content')->with(['filters'=>$filters,'products'=>$products,'categories'=>$categories])->render();
        $this->vars = array_add($this->vars,'shopProducts',$shopProducts);
        $this->vars = array_add($this->vars,'filters',$filters);

        return $this->renderOutput();
    }


    public function getCategory(){
        $categories = Category::with('products')->has('products')->orderBy('title','asc')->get();
        return $categories;
    }

    public function getProducts(){
//        $products = $this->prod_rep->get('*',TRUE);
        $products = Product::with('categories')->has('categories')->paginate(Config::get('settings.paginate'));
        return $products;
    }

    public function getProductFilter(){
        $filters = $this->prod_rep->get()->sortBy('price');
        return $filters;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->title = 'Our shop';
        $product = $this->prod_rep->one($id);
        $shopProducts = view(env('THEME').'.shop.shop_single')->with('product',$product)->render();
        $this->vars = array_add($this->vars,'shopProducts',$shopProducts);

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
