<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette\Object;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_articles")
 */
class Article extends Object
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */    
    protected $id;
   
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $title;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */    
    protected $body;
    
    /**
     * @ORM\Column(type="datetime", name="date_created")
     * @var DateTime
     */     
    protected $dateCreated;

    /**
     * @ORM\Column(type="datetime", name="date_updated", nullable=true)
     * @var DateTime
     */      
    protected $dateUpdated;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */ 
    protected $draft;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    protected $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * @var Category 
     */
    protected $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="article")
     * @var ArrayCollection 
     */
    protected $comments;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="tbl_articles_tags")
     * @var ArrayCollection 
     */
    protected $tags;
    
    public function __construct() {
        $this->comments = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }
    
}