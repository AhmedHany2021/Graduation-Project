<?php

namespace PROJECT\CORE;

trait securedata {
    private function encrypt($data) {
        return openssl_encrypt($data,CIPHERALGO, CIPHERKEY,true,IV);
    }

    private function decrypt($data) {
        return openssl_decrypt($data,CIPHERALGO, CIPHERKEY,true,IV);
    }
    
    private function hash($value)
    {
        return password_hash($value, PASSWORD_BCRYPT,array('salt' => SALT));
    }
}
