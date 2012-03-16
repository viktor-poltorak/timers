<?php
namespace Timers\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A music album.
 * @ORM\Entity
 * @ORM\Table(name="timers")
 * @property int $timer_id
 * @property string $title
 * @property string $description
 * @property bool $recurrent
 * @property string $expires_on
 */
class Timers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int 
     */
    protected $timer_id;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $title;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $description;
    
    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    protected $recurrent;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $expires_on;
    
    /**
     * Maginc getter to expose protected properties.
     * 
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->$key;
    }
    
    /**
     * Magic setter to save protected properties
     * 
     * @param string $key
     * @param mixed $value 
     */
    public function __set($key, $value)
    {
        $this->$key = $value;
    }
    
    /**
     * Convert object to an array
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}