<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hiredOn = (new Carbon)->parse('2020-01-01');
        $sixMonthsAgo = Carbon::now();

        // How many days between two dates
        $diffInDays = $sixMonthsAgo->diffInDays($hiredOn);

        // Get a random number in the range of $diffInDays
        $randomDays = rand(0, $diffInDays);

        //add that many days to $hiredOn
        $randomDate = $hiredOn->addDays($randomDays);
        dd($randomDate->format("Y-m-d H:i:s"));
        return view('dashboard');
    }
}
