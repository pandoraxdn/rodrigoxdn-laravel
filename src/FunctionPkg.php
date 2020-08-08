<?php

namespace RodrigoXdn\Laravel;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Contracts\Encryption\DecryptException;

use DateTime;

class FunctionPkg
{
    private $string, $object, $encryption, $decryption;

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

    public function encrypt_aes(string $value){

        $ciphering = "AES-256-CBC"; 

        $iv_length = openssl_cipher_iv_length($ciphering);

        $options = 0;

        $encryption_iv = '8AC7230489E80000';

        $encryption_key = hash('sha256', "RodrigoXdn");

        $encryption = openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);

        return $encryption;

    }

    public function decrypt_aes(string $value){

        $ciphering = "AES-256-CBC";  

        $iv_length = openssl_cipher_iv_length($ciphering);

        $options = 0;

        $encryption_iv = '8AC7230489E80000';

        $encryption_key = hash('sha256', "RodrigoXdn");

        $decryption = openssl_decrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);

        return $decryption;

    }

    public function encrypt_cipher(string $value){

        $ciphering = "BF-CBC";

        $iv_length = openssl_cipher_iv_length($ciphering); 

        $options = 0; 

        $encryption_iv = random_bytes($iv_length);

        $encryption_key = openssl_digest(php_uname(), 'sha256', TRUE); 

        $encryption = openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);

        return $encryption;

    }

    public function decrypt_cipher(string $value){

        $ciphering = "BF-CBC";

        $iv_length = openssl_cipher_iv_length($ciphering); 

        $options = 0; 

        $encryption_iv = random_bytes($iv_length);

        $encryption_key = openssl_digest(php_uname(), 'sha256', TRUE); 

        $decryption = openssl_decrypt ($value, $ciphering, $decryption_key, $options, $encryption_iv);

        return $decryption;

    }

}

