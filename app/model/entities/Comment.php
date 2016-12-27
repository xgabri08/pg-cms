<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette\Object;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_comments")
 */
class Comment extends Object
{
 
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */    
    protected $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @var string
     */    
    protected $username;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @var string
     */        
    protected $email;
    
    /**
     * @ORM\Column(type="datetime", name="date_created")
     * @var DateTime
     */     
    protected $dateCreated;

    /**
     * @ORM\Column(type="text")
     * @var string
     */     
    protected $body;
   
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * @var User 
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="comments")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     * @var Article 
     */
    protected $article;
    
    public function setDateCreatedNow() {
        $this->dateCreated = new DateTime('now');
    }
    
}