<?php

function redirect(string $url):void{
    header("Location: $url");
}

function validate(string|int $value):bool{
    if(is_null($value) == false and strlen(trim($value)) < 50 and strlen(trim($value)) > 2) return true;
    else return false;
}