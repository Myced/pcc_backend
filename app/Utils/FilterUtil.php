<?php 
namespace App\Utils;

class FilterUtil
{
	public static function filterPhoneNumber($number)
	{
		$regex = '/[\s\,\.\-\+]/';

        if(preg_match($regex, $number))
        {
            $filter = preg_filter($regex, '', $number);
        }
        else
        {
            $filter = $number;
        }

        return $filter;
	}
}