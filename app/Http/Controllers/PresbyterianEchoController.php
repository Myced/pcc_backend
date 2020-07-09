<?php

namespace App\Http\Controllers;

use App\Utils\DateUtil;
use App\PresbyterianEcho;
use Illuminate\Http\Request;

class PresbyterianEchoController extends Controller
{
    public function index()
    {
        $echos = PresbyterianEcho::latest()->get();

        return view('echos', compact('echos'));
    }

    public function create()
    {
        $months = DateUtil::getMonths();

        return view('echo_create', ['months' => $months]);
    }

    public function store(Request $request)
    {
        $echo = new PresbyterianEcho;
        $file = $request->pdf;

        
        $file_name = time() . $file->getClientOriginalName();
        $hash = $this->generateHash();
        $path = $file->storePublicly(PresbyterianEcho::PATH);

        $echo->name = $request->name;
        $echo->code = $request->code;
        $echo->month = $request->month;
        $echo->month_name = DateUtil::getMonthName($request->month);
        $echo->year = $request->year;
        $echo->is_visible = isset($request->is_visible) ? true : false;
        
        //save file information 
        $echo->file_name = $file_name;
        $echo->hash = $hash;
        $echo->path = $path;
        $echo->url = asset($path);
        
        //save the echo magazine;
        $echo->save();

        session()->flash('success', "Presbyterian Echo Magazine Uploaded");

        return back();

        // return redirect()->route('echos');
    }

    public function delete($echo_id)
    {

    }

    private function generateHash()
    {
        $rand = rand(1111111111, 9999999999);

        $value = time() . $rand;

        return sha1($value);
    }
}
