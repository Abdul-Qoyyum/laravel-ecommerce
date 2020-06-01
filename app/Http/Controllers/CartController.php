<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\Product;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Cart::session(Auth::id())->getContent();
        return view('cart.index',compact('items'));
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



    /**
     * Add products to cart
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($id){
       $product = Product::findOrFail($id);
       $userId = Auth::user()->id;

      //if the item exist, update it. else, add a new one.
       if ($items = Cart::session($userId)->getContent()){

           foreach ($items as $item => $value){
               if ($value->id == $product->id){
                   Cart::session($userId)->update($item,['quantity'=>1]);
//                   going to change return value to total cart products later when jQuery is implemented.
                    return redirect()->back();
               }
           }

       }

           Cart::session($userId)->add(array(
               'id' => $product->id,
               'name' => $product->name,
               'price' => $product->price,
               'quantity' => 1,
               'attributes' => array(),
               'associatedModel' => $product
           ));

//        going to change return value to total cart products later when jQuery is implemented.
          return redirect()->back();
    }




}
