<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette\Object;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_user_roles")
 */
class UserRole extends Object
{
  
    const USER_ROLE_ADMIN = 'admin-role';
    const USER_ROLE_USER = 'user-role';
    const USER_ROLE_GUEST = 'guest-role';  
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */    
    protected $id;
    
    /**
     * @ORM\Column(type="string", unique=true, length=30)
     * @var string
     */    
    protected $name;    
 
    /**
    * @ORM\OneToMany(targetEntity="User", mappedBy="userRole")
    * @var ArrayCollection 
    */ 
    protected $users;
    
    public function __construct() {
        $this->$users = new ArrayCollection();
    }
    
    /**
     * @return bool
     */
    public function isRoleAdmin() {
        return $this->name == UserRole::USER_ROLE_ADMIN;
    }
    
    public function setRoleAdmin() {
        $this->name = UserRole::USER_ROLE_ADMIN;
    }
            
    /**
     * @return bool
     */
    public function isRoleUser() {
        return $this->name == UserRole::USER_ROLE_USER;
    }
    
    public function setRoleUser() {
        $this->name = UserRole::USER_ROLE_USER;
    }
    
    /**
     * @return bool
     */
    public function isRoleGuest() {
        return $this->name == UserRole::USER_ROLE_GUEST;
    }
    
    public function setRoleGuest() {
        $this->Name = UserRole::USER_ROLE_GUEST;
    }
        
}
