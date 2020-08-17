<?php

namespace App\Http\Controllers\Api;

use App\Messenger;
use App\PresbyterianEcho;
use App\Utils\DashboardUtil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dashboardUtil = new DashboardUtil;

        return view('dashboard', compact('dashboardUtil') );
	}

	public function echos()
	{
		$books = PresbyterianEcho::where('is_visible', true)->latest()->get();

		return response()->json($books, 200);
	}
	
	public function allEchos()
	{
		$books = PresbyterianEcho::latest()->get();

		return response()->json($books, 200);
	}

	public function messengers()
	{
		$books = Messenger::where('is_visible', true)->latest()->get();

		return response()->json($books, 200);
	}

	public function allMessengers()
	{
		$books = Messenger::latest()->get();

		return response()->json($books, 200);
	}
}
