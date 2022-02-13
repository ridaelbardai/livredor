<?php

/**
 * 
 * front end cotroller
 */

 class App
 {
     protected $controller = "HomeController";
     protected $action = "index";

     protected $params = [];

      
    //Constructeur 
     public function __construct()
     {
        $this->prepareURL();
        $this->render();
        
     }


     private function prepareURL()
     {
        $url = $_SERVER['QUERY_STRING'];
        if (!empty($url)) 
        {
            $url = trim($url,'/');
            $url = explode("/",$url);

            //define the controller
            $this->controller = isset($url[0])?ucwords($url[0])."Controller":"HomeController";
            //define the action
            $this->action = isset($url[1])?$url[1]:"index";

            unset($url[0],$url[1]);
            $this->params = !empty($url) ? array_values($url):[];
           
        }
     }


     private function render()
     {
         if(class_exists($this->controller))
         {
            $controller = new $this->controller;
            if (method_exists($controller,$this->action))
            {
                call_user_func_array([$controller,$this->action],$this->params);
            }else{
                echo " methode ".$this->action." n'existe pas !!!!!!!";
            }
         }else{
             http_response_code(404);
             echo " This controller : ".$this->controller." do  not exists";
         }
     }
 }