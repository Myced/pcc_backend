<?php

namespace App\Http\Controllers\Api;

use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseItem;

class PurchaseController extends Controller
{
    public function addPurchase(Request $request)
    {
        //save the item purchase. 
        $purchase = new Purchase;

        $purchase->user_id = $request->user_id;
        $purchase->purchase_item_id = $request->purchase_item_id;
        $purchase->item_name = $request->item_name;
        $purchase->item_type = $request->item_type;
        $purchase->customer_name = $request->customer_name;
        $purchase->customer_tel = $request->customer_tel;
        $purchase->amount = $request->amount;

        $purchase->save();

        //check that this item by this user has not been bought already 
        $result = [
            "success" => true,
            "message" => "Purchase Successful",
            "data" => $purchase
        ];

        return response()->json($result, 200);
    }

    public function purchaseList(Request $request)
    {
        $user_id = $request->user_id;

        $purchases = Purchase::where('user_id', $user_id)->latest()->get();

        $result = [
            "success" => true,
            "message" => "Transaction successful",
            "data" => $purchases
        ];

        return response()->json($result, 200);
    }

    public function getPurchaseItem($code)
    {
        $purchaseItem = PurchaseItem::where('item_code', $code)->first();

        $result = [
            "success" => true,
            "message" => "Transaction successful",
            "data" => $purchaseItem
        ];

        return response()->json($result, 200);
    }
}
