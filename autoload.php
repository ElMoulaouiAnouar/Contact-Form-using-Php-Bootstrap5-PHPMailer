<?php 
require './config/config.php';
spl_autoload_register(function($className){
    if(file_exists('helpers/'.$className.'.php')){
        require 'helpers/'.$className.'.php';
    }
});