<?php 

class Rotas {

    private $controller = 'Paginas';
    private $method = 'home';
    private $params;

    function __construct(){
        $url = $this->getUrl() ? $this->getUrl() : [0];
        
        $this->getControllerFromUrl($url);
        require_once '../app/Controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;
        unset($url[0]);

        $this->getMethodFromUrl($url);
        unset($url[1]);

        $this->params = $this->getParamsFromUrl($url);

        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function getUrl(){
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if(isset($url)){
            $url = $this->dataFilter($url);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function dataFilter($data){
        $data = trim(rtrim($data));
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getControllerFromUrl($url){
        if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')){
            $this->controller = ucwords($url[0]);
        }
    }

    public function getMethodFromUrl($url){
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
            }
        }
    }

    public function getParamsFromUrl($url){
        if($url){
            return array_values($url);
        } else {
            return [];
        }
    }



}

?>