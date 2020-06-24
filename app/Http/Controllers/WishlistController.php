<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Cart;
use function GuzzleHttp\Promise\all;

class WishlistController extends Controller
{

    protected $wishlist = [];

    /**
     * set global variable for wishlist
     * WishlistController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->wishlist = app('wishlist');
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
        $items = $this->wishlist->getContent();
        $total = $this->wishlist->getTotal();
        $subtotal = $this->wishlist->getSubTotal();
        return view('wishlist.index',compact('items','total','subtotal'));
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

        $this->wishlist->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return response([
            'count' => $this->wishlist->getContent()->count()
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
        return "Show hijacked the request.";
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
        $this->wishlist->remove($id);
        return redirect()->back();

    }


    /**
     * Move product from wishlist to cart
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart($id){
         $product = Product::findOrFail($id);
//         add to cart
         Cart::session(Auth::user()->id)->add(array(
             'id'=>$product->id,
             'name'=>$product->name,
             'price'=>$product->price,
             'quantity'=>1,
             'attributes'=>[],
             'associatedModel'=>$product
         ));
//         remove form wishist
        $this->wishlist->remove($product->id);
        return redirect()->back();
    }




    /**
     * Clear user wishlist resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearWishlist()
    {
        $this->wishlist->clear();
        return redirect()->back();
    }



}
