<?php
require_once'config/config.php';

spl_autoload_register(function($class)
{
  if(file_exists('../app/libraries/'.$class.'.php'))
  {
    require_once'libraries/'.$class.'.php';
  }
});
 ?>
