<?php 

class Controller {

public function model($model){
    if(file_exists('../app/Models/'.$model.'.php')){
        require_once ('../app/Models/'.$model.'.php');
        return new $model;
    }
}

public function view($view, $dados = []){
    if(file_exists('../app/Views/'.$view.'.php')){
        require_once('../app/Views/'.$view.'.php');
    } else {
        die('Não foi possível encontrar a view');
    }
}

}

?>