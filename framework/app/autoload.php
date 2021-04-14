<?php 

spl_autoload_register( function($classe){

    $directorys = [
        'Helpers',
        'Libraries'
    ];

    foreach($directorys as $directory){
        if(file_exists(__DIR__.DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR.$classe.'.php')){
            require_once (__DIR__.DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR.$classe.'.php');
        }
    }

});

?>