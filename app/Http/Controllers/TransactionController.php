<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

use App\User;

class TransactionController extends Controller
{
    public function hook(){
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $payload = @file_get_contents('php://input');
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        }

//        After the checkout session has been completed...
        if (isset($event) && $event->type == 'checkout.session.completed'){
//            Give your customer the value here...
              $object = $event->data->object;
//            Retrieve the transaction record if it already exist
            $transaction = Transaction::where('txn_id','=',$object->id)->first();
//            if the transaction record does not exist
            if(!$transaction){
//            get the user from the reference id received from the payload
                $user = User::findOrFail((int)$object->client_reference_id);
//            create transaction record on transaction table
                $user->transaction()->create(['txn_id'=>$object->id]);
            }
        }


        http_response_code(200);
    }



    public function handleEvent($event){
           file_put_contents(base_path() . '/event.json',$event);
    }


    public function handleCheckoutSession($session){
        file_put_contents(base_path() . '/session.json',$session);
    }



}
