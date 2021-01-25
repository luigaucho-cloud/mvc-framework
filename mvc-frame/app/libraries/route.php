<?php

class route
{
  //setting default class, method and data
  private $class='main';
  private $method= 'index';
  private $data= [];

  public function __construct()
  {
    //running geturl method once init
    $this->geturl();
  }
  public function geturl()
  {
    if(isset($_GET['url']))
    {
      //removing white spaces
      $url =rtrim($_GET['url']);
      //sanitize url
      $url= filter_var($url, FILTER_SANITIZE_URL);
      //conversion into an array
      $url = explode('/',$url);

      if(isset($url[0]))
      {
        if(file_exists('../app/controllers/'.$url[0].'.php'))
        {
        $this->class = $url[0];
          unset($url[0]);
        }
      }

      //require file and init class
      require_once'../app/controllers/'.$this->class.'.php';
      $class = new $this->class;

      //check for method

      if(isset($url[1]))
      {
        if(method_exists($class, $url[1]))
        {
          $this->method= $url[1];
          unset($url[1]);
        }
      }

      $this->data = $url ? array_values($url):[];
      call_user_func_array([$class, $this->method ], $this->data);
    }
  }

}


 ?>
