<?php 

class Session {

    public static function message($name, $text = null, $class = null){

        if(!empty($name)) {
            if(!empty($text) && empty($_SESSION[$name])) {
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

                $_SESSION[$name] = $text;
                $_SESSION[$name.'class'] = $class;
            } elseif(!empty($_SESSION[$name]) && empty($text)) {
                $class = !empty($_SESSION[$name.'class']) ? $_SESSION[$name.'class'] : 'alert-success';
                echo '<div class="'.$class.'">'.$_SESSION[$name].'</div>';
            }
        }

    }

}

?>