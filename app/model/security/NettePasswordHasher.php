<?php

namespace App\Model\Security;

use App\Model\Security\IPasswordHasher;
use Nette\Security\Passwords;

class NettePasswordHasher implements IPasswordHasher
{
    
    /**
     * @param string $password
     * @return string
     */
    public function hash($password) {
        return Passwords::hash($password);
    }
    
    /**
     * @param string @password
     * @param string @hash
     * @return bool
     */     
    public function verify($password, $hash) {
        return Password::verify($password, $hash);
    }
    
}