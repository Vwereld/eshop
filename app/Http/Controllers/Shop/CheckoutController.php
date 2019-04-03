<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\CheckoutRequest;
use App\Product;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends ShopController
{
    public function __construct(CategoriesRepository $cat_rep, ProductsRepository $prod_rep)
    {
        parent::__construct();
        $this->cat_rep = $cat_rep;
        $this->prod_rep = $prod_rep;
        $this->template = env('THEME').'.checkout.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $cartItems = \Cart::content();


            $ids = $cartItems->pluck('id');

            $models = Product::with('categories')->findMany($ids);

            $categories = $this->getCategory();
            $product = Product::where('id', request()->id)->first();

            $shopProducts = view(env('THEME').'.checkout.content')->with(['cartItems'=>$cartItems,'models'=>$models,'ids'=>$ids,'product'=>$product,'categories'=>$categories])->render();
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
    public function store(CheckoutRequest $request)
    {
        $stripe = Stripe::make('sk_test_lRQKg86TOaQyVr7fyYpJJWR2');
        try{
            $charge = Stripe::charges()->create([
                'amount'=> Cart::total(),
            'currency'=> 'EUR',
            'source'=>$request->stripeToken,
            'receipt_email' => $request->email,

            ]);
//            Success
            Cart::instance('default')->destroy();
           return redirect(route('shop.index'))->with('status','Your payment has been received');
        }

        catch (CardErrorException $e){
            return back()->withErrors('Error !' . $e->getMessage());
        }
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
        //
    }
}
