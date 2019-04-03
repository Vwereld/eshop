<?php

namespace App\Http\Controllers\Shop;

use App\Product;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Mail;

class CartController extends ShopController
{
    public function __construct(CategoriesRepository $cat_rep, ProductsRepository $prod_rep)
    {
        parent::__construct();
        $this->cat_rep = $cat_rep;
        $this->prod_rep = $prod_rep;
        $this->template = env('THEME').'.cart.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();


        $ids = $cartItems->pluck('id');

        $models = Product::with('categories')->findMany($ids);

        $categories = $this->getCategory();
        $product = Product::where('id', request()->id)->first();
        $shopProducts = view(env('THEME').'.cart.content')->with(['cartItems'=>$cartItems,'models'=>$models,'ids'=>$ids,'product'=>$product,'categories'=>$categories])->render();
        $this->vars = array_add($this->vars,'shopProducts',$shopProducts);
       return $this->renderOutput();
    }
    public function getCategory(){
        $categories = $this->cat_rep->get();
        return $categories;
    }

    public function getProducts(){
        $products = $this->prod_rep->get('*',TRUE);
        return $products;
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

        $duplicates = Cart::search(function ($cartItem, $rowId) use($request){
           return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()){
return back()->with('status','Item is already in your cart!');
        }
        Cart::add(['id'=>$request->id,'name'=>$request->title,'price'=>$request->price,'qty'=>1]);
                    $data=[
            ];
        Mail::send('emails.welcome', $data, function ($msg) {
                $msg->to('v.brilyak@gmail.com');
            });

        return back()->with('status','Item has been added to cart!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Cart::remove($id);
        return back();
    }
}
