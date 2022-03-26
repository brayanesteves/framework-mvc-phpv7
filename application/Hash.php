<?php
    class Hash {
        public static function getHash($algorithm, $data, $key) {
            $hash = hash_init($algorithm, HASH_HMAC, $key);
            hash_update($hash, $data);

            return hash_final($hash);
        }
    }
?>