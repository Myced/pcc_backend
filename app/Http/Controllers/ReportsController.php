<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {

    }

    public function purchases()
    {
        $purchases = Purchase::latest()->get();
        
        return view('reports.purchases', compact('purchases'));
    }
}
