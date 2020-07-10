<?php 

namespace App\Utils;

class DateUtil
{
    const months = [
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    ];

    public static function getMonths()
    {
        return self::months;
    }

    public static function getMonthName($code)
    {
        if( isset( self::months[$code] ) )
        {
            return self::months[$code];
        }

        return "";
    }
}