<?php


class validation{
   
    public $errors = [];

    static public $data = [];

    public function validate($data,$validation){
        validation::$data = $data;
        foreach ($data as $key => $value) {
            # code...
            foreach ($validation as $key2 => $type_validation) {
                # code...
                if($key == $key2){
                    $error = [];
                    $array_type_validation = $this->spliteValue($type_validation);
                    for ($i=0; $i <count($array_type_validation) ; $i++) { 
                        # code...
                      $error [] =  $this->valid($key,$value,$array_type_validation[$i]);
                    }
                    $this->errors [$key] = $error;
                }
            }
        }
    }

 

 public function spliteValue($value){
     return explode('|',$value);
 }

    private function valid($key,$value,$type_validation){
        switch($type_validation){
            case 'require': 
                if(empty($value)){
                    return $key .' is require';
                }
            break;
            case 'chaine':
                if(!preg_match('/^[a-zA-Z]+$/i',$value)){
                    return  $key ." incorrect";
                }
            break;
            case 'email':
                if(!preg_match('/^([0-9A-Za-z_.]{5,})\@[a-z]{4,6}\.[a-z]{2,3}$/i',$value)){
                    return  $key ." incorrect";
                }
            break;
            case 'subject':
                if(!preg_match('/^.+$/i',$value)){
                    return  $key ." incorrect";
                }
            break;
            case 'file':
                $extention_file = strtolower('.'.explode('.',$value)[count(explode('.',$value))-1]);
                if(!preg_match('/^(.png|.pdf|.jpg|.jpeg|.mp3|.mp4|.zip|.rar)$/i',$extention_file)){
                    return  $key ." incorrect";
                }
            break;
                default : 
                   return;
        }
    }

    public function DisplayError($key){
        //check if array errors not null or exists
       if(isset($this->errors)){
           #check if key exists
             if(isset($this->errors[$key])){
                //boocle in array errors
                for ($i=0; $i < count($this->errors[$key]) ; $i++) { 
                    //check if error index $i if null contunie else retunr error
                    if(is_null($this->errors[$key][$i])){
                        continue;
                    }
                    else{
                        echo $this->errors[$key][$i];
                        return;
                    }
                }
            }
            else 
                echo '';
        }
        else{
            echo '';
        }
    }

    public function ErrorCount(){
        $errorCount  = 0;
        foreach ($this->errors as $key => $value) {
            # booble on arrays erroors
            $ver =  false;
            for ($i=0; $i <count($value) ; $i++) { 
                # boocle on check array errors
                if(is_null($value[$i])){
                    //chec if can not error => contunie
                    continue;
                }
                else{
                    //if exist error change value variable $ver to true 
                    $ver = true;
                }
            }
            if($ver == true){
                $errorCount += 1;
            }
            
        }
        return $errorCount;
    }

}