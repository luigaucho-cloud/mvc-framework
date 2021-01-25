<?php
class main extends controller
{
  public function __construct()
  {
  }
  public function index()
  {
    $data=[
      'name'=>'LINCOLN MVC FRAMEWORK',
      'page'=>'HOME PAGE'
  ];
    $this->view('index', $data);
  }
  public function contact()
  {
    $data=[
      'name'=>'LINCOLN MVC FRAMEWORK',
      'page'=>'CONTACT'
    ];
    $this->view('contact', $data);
  }
}

 ?>
