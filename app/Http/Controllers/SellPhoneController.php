<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellPhoneController extends Controller
{
    public function index()
    {
        return view('pages.sell-phone.index');
    }

    public function confirm(Request $request)
    {
       return view('pages.sell-phone.confirm');
    }

    public function confirmed(Request $request)
    {
       return view('pages.sell-phone.confirmed');
    }

}
