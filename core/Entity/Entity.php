<?php 

namespace Core\Entity;

class Entity{

    /**
     * 
     * fonction magique __get  
     * 
     * @return methode()
     * 
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
    
}