<?php

namespace App\Http\Controllers;

use App\Messenger;
use App\Utils\DateUtil;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
        $messengers = Messenger::latest()->get();

        return view('messengers', compact('messengers'));
    }

    public function create()
    {
        return view('messenger_create');
    }

    public function store(Request $request)
    {
        $messenger = new Messenger;
        $file = $request->pdf;

        
        $file_name = time() . $file->getClientOriginalName();
        $hash = $this->generateHash();
        $path = 'storage/' . $file->storePublicly(Messenger::PATH);

        $messenger->name = $request->name;
        $messenger->code = $request->code;
        $messenger->year = $request->year;
        $messenger->is_visible = isset($request->is_visible) ? true : false;
        
        //save file information 
        $messenger->file_name = $file_name;
        $messenger->hash = $hash;
        $messenger->path = $path;
        $messenger->url = asset($path);
        
        //save the messenger magazine;
        $messenger->save();

        session()->flash('success', "The Messenger Uploaded !!");

        return redirect()->route('messengers');
    }

    private function generateHash()
    {
        $rand = rand(1111111111, 9999999999);

        $value = time() . $rand;

        return sha1($value);
    }
}
