<?php

namespace RodrigoXdn\Laravel;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Contracts\Encryption\DecryptException;

use DateTime;

class FunctionPkg
{
    private $string, $object;

    public function current_day()
    {
    	$string = Crypt::encrypt(date_format(new DateTime('now'),'d/m/Y H:i:s'));

    	return $string;

    }

    public function format_date()
    {
        $string = date_format(new DateTime('now'),'d/m/Y H:i:s');

        return $string;
    }

    public function encrypt(string $value)
    {
    	$string = Crypt::encrypt($value);

    	return $string;
    }

    public function decrypt(string $value)
    {
    	try {

    		$string = Crypt::decrypt($value);

    		return $string;
    		
    	} catch (DecryptException $e) {

    		$string = null;

    		return $string;
    		
    	}
    }

    public function request_date(string $time)
    {
        $string = Crypt::encrypt(date_format(new DateTime($time),'d/m/Y H:i:s'));

        return $string;
    }

    public function create_format(string $time)
    {
        $object = date_create_from_format('d/m/Y H:i:s', $time);

        return $object;
    }

}

