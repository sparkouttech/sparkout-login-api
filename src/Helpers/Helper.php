<?php

namespace Sparkout\SparkoutLogin\Helpers;

class Helper {

    /**
     * @param $stringToEncrypt String
     *
     * @return string
     */
    public static function encrypt($stringToEncrypt) {
        $key = hash('sha256', "sparkout");
        $iv = substr(hash('sha256', 'developer'), 0, 16);
        $output = openssl_encrypt($stringToEncrypt, "AES-256-CBC", $key, 0, $iv);
        return base64_encode($output);
    }

    /**
     * @param $stringToEncrypt String
     *
     * @return string
     */
    public static function decrypt($stringToDecrypt) {
        $key = hash('sha256', 'sparkout');
        $iv = substr(hash('sha256', 'developer'), 0, 16);
        $output = openssl_encrypt($stringToDecrypt, "AES-256-CBC", $key, 0, $iv);
        return base64_encode($output);
    }

}
