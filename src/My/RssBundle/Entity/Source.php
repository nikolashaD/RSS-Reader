<?php

namespace My\RssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * My\RssBundle\Entity\Source
 */
class Source
{
    /**
     * @var integer $id
     */
    //private $id;
        
    protected $id;

    public $url;
    
    public $name;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
