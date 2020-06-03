<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\Product;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * set the current logged in user cart as global
     * CartController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;
            $this->cart = Cart::session($this->id);
            return $next($request);
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = $this->cart->getContent();
        $total = $this->cart->getTotal();
        $subtotal = $this->cart->getSubTotal();
        return view('cart.index',compact('items','total','subtotal'));

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
        $product = Product::findOrFail($request->id);

        $this->cart->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return response([
          'count' => $this->cart->getContent()->count()
        ],200,[]);

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
         $product = Product::findOrFail($id);
         return view('cart.show',compact('product'));
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

//      stop the execution of the script if user enter quantity less than zero
        if ($request->quantity <= 0){
            return;
        }

//        modify the quantity
        $this->cart->update($id,[
            'quantity'=>[
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);

//      more values can be returned later like shipping
        return response([
            'subtotal'=> $this->cart->getSubTotal(),
            'total'=> $this->cart->getTotal()
        ],200,[]);

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
        $this->cart->remove($id);
        return redirect()->back();

    }


    /**
     * clear the current user cart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear(){
        $this->cart->clear();
        return redirect()->back();
    }


}
