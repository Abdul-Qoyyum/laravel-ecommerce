<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartCheckoutController extends Controller
{

    protected $successRoute = '/checkout/success/{CHECKOUT_SESSION_ID}';

    protected $cancelRoute = '/checkout/cancel';

    public $products = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;
            $this->cart = Cart::session($this->id);
            $this->stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            return $next($request);
        });
    }

    //
    public function checkout(){
         $products = $this->cart->getContent();

         foreach ($products as $product){
//             create the products
             $item = $this->createProduct($product);

//           create the price for each products
             $price = $this->createPrice($item, $product);

//           Arrange the line items for the session
             $this->products[] = [
                 'price'=> $price->id,
                 'quantity'=> $price->quantity,
             ];
         }
//         Remember to clear cart after purchase of items
             return response($this->createSession($this->products)->id,200);
    }




    public function createProduct($product){

        $item = $this->stripe->products->create([
            'name' => $product->name,
            'active'=>true,
            'images'=>[
                  url('/') . $product->associatedModel->photo->first_url,
            ],
            'description'=>$product->associatedModel->description,
        ]);

        return $item;
    }




    public function createPrice($item, $product){

        $item = $this->stripe->prices->create([
            'product' => $item->id,
            'unit_amount' => $product->price * 100,
            'currency' => 'usd',
        ]);

//      Assign the quantity from the cart
        $item->quantity = $product->quantity;

//      Add the product's id from the cart
        $item->localId = $product->associatedModel->id;

        return $item;
    }




    public function createSession($lineItems){

        return $this->stripe->checkout->sessions->create([
            'success_url' => url($this->successRoute),
            'cancel_url' => url($this->cancelRoute),
            'client_reference_id' => auth()->user()->id,
            'mode'=>'payment',
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
        ]);

    }


    public function success($session_id){

        echo "Received  $session_id";

    }


    public function cancel(){
       echo "Hello from cancel url page.";
    }






}
