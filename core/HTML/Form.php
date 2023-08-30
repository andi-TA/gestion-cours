<?php

namespace Core\HTML;

class Form{

    protected $data;

    public function __construct($data = array())
    {
        $this->data = $data;
    }
    
    public function label($text)
    {
        return "<label for='{$text}'>{$text}</label>";
    }

    public function input($name,$type = [],$val = null)
    {
        if (is_null($val))
            return "<input type='{$type}'required name='{$name}' placeholder='...' class='ipt'/>";
        else
            return "<input type='{$type}'required name='{$name}' placeholder='...' class='ipt' value='" . $this->getValue($val) . "'/>";

    }

    public function submit($text, $name,$id = null,$class = null)
    {
        return "<button style='padding:10px;' class='{$class}' type='submit' name='{$name}' id='{$id}' >{$text}</button>";
    }
    
    /**
     * 
     * Recupère le donnée de la valuer dans la table situer dans la base
     * 
     * @return string ou null
     * 
     */
    public function getValue($index)
    {
        if(is_object($this->data))
            return $this->data->$index;
        
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
}