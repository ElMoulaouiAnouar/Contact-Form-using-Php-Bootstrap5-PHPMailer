<?php
class Filter{
    static public function Filter_input($input_value){
        $input_value = trim($input_value);
        $input_value = htmlspecialchars($input_value);
        $input_value = stripslashes($input_value);
        return $input_value;
    }
}