<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    const ITEM_DIARY = "DIARY";
    const ITEM_HYMN = "HYMN";
    const ITEM_MESSENGER = "MESSENGER";
    const ITEM_ECHO = "ECHO";

    public static function getItemTypes()
    {
        return [
            self::ITEM_DIARY,
            self::ITEM_HYMN,
            self::ITEM_MESSENGER,
            self::ITEM_ECHO
        ];
    }
}
