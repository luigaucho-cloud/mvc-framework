<?php

class controller
{

public function model($model)
{
  if(file_exists('../app/models/'.$model.'.php'))
  require_once '../app/models/'.$model.'.php';
 return  new $model;
}
  public function view($view, $data= [])
  {
    if(file_exists(APPROOT.'/views/pages/'.$view.'.php'))
    {
      require_once APPROOT.'/views/pages/'.$view.'.php';
    }
    else {
      die('File does not exist.');
    }

  }
}

 ?>
