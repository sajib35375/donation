<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class DonationController extends Controller
{
    public function donationView(){
        return view('frontend.donation.donation');
    }

    public function donationStore(Request $request){
//        dd($request->all());
        $data = array();

        $data['donate'] = $request->donate;
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['address'] = $request->address;
        $data['adress_op'] = $request->adress_op;
        $data['phone'] = $request->phone;
        $data['city'] = $request->city;
        $data['employer'] = $request->employer;
        $data['country'] = $request->country;
        $data['occupation'] = $request->occupation;
        $data['state'] = $request->state;
        $data['email'] = $request->email;
        $data['postal'] = $request->postal;

        return view('frontend.donation.stripe',compact('data'));
    }

    public function stripeStore(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51JQXKXEeQL3aThfwXWkUmLfrkq2GvG3dXlz2wArOqavl6w5dzwYoMkbhU9s30NhUWAjxNNhFVzC7ddUXkdksFwr900W8ZEzCdP'
        );


        $token = $_POST['stripeToken'];


        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Donation',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);


        Donation::insert([
            'user_id' => Auth::id(),
            'donate' => $request->donate,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'adress_op' => $request->adress_op,
            'phone' => $request->phone,
            'city' => $request->city,
            'employer' => $request->employer,
            'country' => $request->country,
            'occupation' => $request->occupation,
            'state' => $request->state,
            'email' => $request->email,
            'postal' => $request->postal,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'order_id' => $charge->metadata->order_id,
            'description' => $charge->description,
            'payment_type' => 'stripe',
            'payment_method' => $charge->payment_method,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Donation Send Successfully',
            'alert_type' => 'success'
        );
        return redirect()->route('frontend.index')->with($notification);




    }














}
