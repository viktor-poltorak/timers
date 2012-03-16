<?php
namespace Album\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A music album.
 * @ORM\Entity
 * @ORM\Table(name="album")
 * @property string $artist
 * @property string $title
 * @property int $id 
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $artist;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $title;
    
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