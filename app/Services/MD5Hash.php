<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Hashing\BcryptHasher;

class MD5Hash extends BcryptHasher
{
    public function check($value, $hashedValue, array $options = array()): bool
    {
        $user = User::wherePass(md5($value))->first();
        return (bool)$user;
    }
}
