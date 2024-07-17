<?php 
namespace Core;
class Validator{

    public static function string ($value, $min=1, $max=255){
        return strlen($value)>=$min && strlen($value)<=$max; 
    }

    public static function file ($file){
        return (!isset($file) || $file['error'] === 4);
    }
    
}