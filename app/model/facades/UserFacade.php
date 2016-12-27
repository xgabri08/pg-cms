<?php

namespace App\Model\Facades;

use App\Model\Entities\User;
use Kdyby\Doctrine\EntityManager;
use Nette\Object;

class UserFacade extends Object
{
    
    /**
     * @var EntityManager
     */
    private $em;
    
    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
    
    /**
     * @param int|NULL $id
     * @return User|NULL
     */
    public function getUser($id){
        return isset($id) ? $this->em->find(User::class, $id) : NULL;
    }
            
    
}

