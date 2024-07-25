<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeInController extends Controller
{
    public function index()
    {
        return view('pages.trade-in');
    }

    public function confirm(Request $request)
    {
        $tradeInData = $request->all();

       return view('pages.trade-in.confirm', [
        'tradeInData' => $tradeInData
       ]);
    }

    public function confirmed(Request $request)
    {
       return view('pages.trade-in.confirmed');
    }
}
