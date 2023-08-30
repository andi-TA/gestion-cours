<?php

namespace Core\HTML;

class ReForm extends Form{

    public function input($name,$type = [],$val = null,$acc = null)
    {
        $type = isset($type['type']) ? $type['type'] : 'text';
        
        if($val === null && $acc === null)
            return "<input required type='{$type}' placeholder='...' name='{$name}' class='ipt'/>";
      
        if($type === 'password' && is_null($val))
            return "<input required type='{$type}' minlength='{$acc}' placeholder='...' name='{$name}' class='ipt' value='{$val}'/>";
        
        if(!is_null($val) && $type !== "radio")
            return "<input required type='{$type}' {$acc} placeholder='...' name='{$name}' class='ipt' value='".$this->getValue($val)."'/>";

        if($type === 'textarea')
            return "<textarea required name = '{$name}' id = 'area' placeholder='...' cols = '150' rows ='2'> {$name} </textarea>";
        
        if($type === "radio")
            return "<input required type='{$type}' placeholder='...' name='{$name}' class='ipt' value='{$val}'/>";

    }
    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select  name="' . $name . '">';
        foreach ($options as $k => $v) {
            $atttributes = '';
            if ($k == $this->getValue($name)) {
                $atttributes = 'selected';
            }
            $input .= "<option value = '{$k}' {$atttributes}>$v</option>";
        }
        $input .= '</select>';
        return $label .'</br>'. $input;
    }
}
