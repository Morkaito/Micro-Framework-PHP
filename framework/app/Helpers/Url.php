<?php 

class Url {

    public static function Redirect($url = null){
        if(is_null($url)){
            header('Location: '.URL);    
        } else {
            header('Location: '.URL.DIRECTORY_SEPARATOR.$url);
        }
    }

}

?>