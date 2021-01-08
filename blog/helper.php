<?php

/**
 * @param $array
 */
function debug($array){
   echo '<pre>' . print_r($array, true) . '</pre>';
}

/**
 * @param $number
 * @param string $description
 * @return bool
 * @throws Exception
 */
function isINT($number, $description = " "){
    if(empty(intval((int)$number))){
        throw new \Exception($description . ' isn`t number');
        }
    return true;
}

/**
 * @param $name
 * @return string
 */
function defineUrlImage($name)
{
    if(preg_match("~^https?://\S+(?:jpg|jpeg|png)$~", $name)){
        return $name;
    }

    return UPLOAD_DIR . ($name ?? DEFAULT_IMG);
}