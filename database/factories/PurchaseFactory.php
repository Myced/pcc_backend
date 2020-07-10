<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Purchase;
use Carbon\Carbon;
use App\PurchaseItem;
use Faker\Generator as Faker;

$factory->define(Purchase::class, function (Faker $faker) {

    $user = \App\User::all()->random(1)->first();
    $puchaseItem = \App\PurchaseItem::all()->random(1)->first();

    $hiredOn = (new Carbon)->parse('2020-01-01');
    $sixMonthsAgo = Carbon::now();

    // How many days between two dates
    $diffInDays = $sixMonthsAgo->diffInDays($hiredOn);

    // Get a random number in the range of $diffInDays
    $randomDays = rand(0, $diffInDays);

    //add that many days to $hiredOn
    $randomDate = $hiredOn->addDays($randomDays);

    $date = $randomDate->format("Y-m-d H:i:s");

    $prices  = [
        PurchaseItem::ITEM_DIARY => 500,
        PurchaseItem::ITEM_ECHO => 100,
        PurchaseItem::ITEM_HYMN => 1000,
        PurchaseItem::ITEM_MESSENGER => 500
    ];

    return [
        "user_id" => $user->id,
        "purchase_item_id" => $puchaseItem->id,
        "item_name" => $puchaseItem->name,
        "item_type" => $puchaseItem->type,
        "customer_name" => $user->name,
        "customer_tel" => $user->tel,
        "amount" => $prices[$puchaseItem->type],
        'created_at' => $date,
        'updated_at' => $date
    ];
});
