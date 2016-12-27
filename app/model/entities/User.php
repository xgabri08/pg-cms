<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette\Object;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use App\Model\Security\IPasswordHasher;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_users")
 */
class User extends Object
{
   
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */    
    protected $id;
    
    /**
     * @ORM\Column(type="string", unique=true, length=30, name="x_username")
     * @var string
     */    
    protected $username;

    /**
     * @ORM\Column(type="string", length=100, name="x_password")
     * @var string
     */        
    protected $password;

    /**
     * @ORM\Column(type="string", unique=true, length=50, name="x_email")
     * @var string
     */        
    protected $email;
    
    /**
     * @ORM\Column(type="datetime", name="date_registered")
     * @var DateTime
     */        
    protected $dateRegistered;
    
    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */            
    protected $active;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserRole", inversedBy="users")
     * @ORM\JoinColumn(name="user_role_id", referencedColumnName="id")
     * @var UserRole 
     */
    protected $userRole;
    
    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="users")
     * @var ArrayCollection 
     */
    protected $articles;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     * @var ArrayCollection
     */
    protected $comments;        

    /**
     * @var IPasswordHasher 
     */
    protected $passwordHasher;
    
    public function __construct(IPasswordHasher $passwordHasher){
        $this->passwordHasher = $passwordHasher;
        $this->articles = new ArrayCollection();              
        $this->comments = new ArrayCollection();
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $this->passwordHasher->hash($password);
    }
    
    /**
     * @param string $password
     * @return bool
     */    
    public function verifyPassword($password)
    {
        return $this->passwordHasher->verify($password, $this->password);
    }    
    
    public function setDateRegisteredNow()
    {
        $this->dateRegistered = new DateTime('now');
    }        
    
}


