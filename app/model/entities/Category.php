<?php

namespace App\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette\Object;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tbl_categories")
 */
class Category extends Object
{
    
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
    * @ORM\ManyToOne(targetEntity="Article", inversedBy="category")
    * @var ArrayCollection 
    */ 
    protected $articles;
    
    public function __construct() {
        $this->articles = new ArrayCollection();
    }
    
}