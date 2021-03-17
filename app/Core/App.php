<?php

// class App{

//     // public function __construct(){
//     //      echo "<h1>hello world</h1>";
//     //      echo "hello world"
//     // }

//     // private $controller = "Home";
//     // private $method = "index";
//     // private $params = [];

//     // public function __construct(){
//     //    $url =  $this->parseURL();
//     //     var_dump($url);

//     // }

//     // public function parseURL(){
//     //     if(isset($_GET['url'])){
//     //         $url = $_GET['url'];
//     //         $url = rtrim($url,'/');
//     //         $url = filter_var($url,FILTER_SANITIZE_URL);
//     //         $url = explode('/',$url);
//     //         return $url;
//     //     }
//     // }
// }

class App{
    private $controller = "Home";
    private $method = "index";
    private $params = [];

    public function __construct(){
        $url =  $this->parseURL();

        // controller
        if(isset($url)){
            if(file_exists('../app/controller/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        require_once('../app/controller/'.$this->controller.'.php');
        $this->controller = new $this->controller;

        // method
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if(!empty($url)){
            $this->params = array_values($url);
        }
        call_user_func_array([$this->controller,$this->method],$this->params);
    }
    public function parseURL(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url,'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);

            return $url;


        }
    }

}

?>