<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class AdminDonationController extends Controller
{

    public function viewDonation(){
        $donation = Donation::with('user')->get();
        return view('admin.donation.donation',compact('donation'));
    }

}
