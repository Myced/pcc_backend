<?php 

namespace App\Utils;

use App\User;
use App\Purchase;

class DashboardUtil
{
    public $purchaseCount;
    public $purchaseAmount;
    public $amountThisMonth;
    public $usersCount;


    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $purchases = Purchase::selectRaw("count(*) as purchase_count, sum(amount) as purchase_total")->first();
        $users = User::selectRaw("count(*) as users_count ")->first();


        $this->purchaseAmount = $purchases->purchase_total;
        $this->purchaseCount = $purchases->purchase_count;
        $this->usersCount = $users->users_count;

        $this->initAmountThisMonth();
    }

    private function initAmountThisMonth()
    {
        $monthStart = date("Y-m") . "-01";
        $monthEnd = now()->format('Y-m-d');

        $purchases = Purchase::selectRaw("sum(amount) as purchase_amount ")
                                ->whereDate('created_at', '>=', $monthStart)
                                ->whereDate('created_at', '<=', $monthEnd)
                                ->first();

        $this->amountThisMonth = $purchases->purchase_amount;
    }

    public static function getLatestPurchases()
    {
        return Purchase::latest()->limit(5)->get();
    }
}