<?php
class database
{ private $dbname = DB_NAME;
  private $user = USER;
  private $pass= PASS;
  private $host = HOST;
  private $stmt;
  private $error;
  private $pdo;


  public function __construct()
  {
    $dsn = 'mysql:host='.$this->host.'; dbname='.$this->dbname;
    $options=[
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
      ];

      //CREATE NEW PDO INSTANCE
      try
      {
    $this->pdo = new PDO($dsn, $this->user,$this->pass, $options);
  }
  catch(PDOException $e)
  {
    echo $this->error=$e->getMessage();
       echo $this->error;
  }


  }
  public function prepare($query)
  {
return $this->stmt= $this->pdo->prepare($query);
  }
  //bind values
  public function bind($param,$value,$type=null)
  {
    if(is_null($type))
    {
      switch(true)
      {
        case is_int($value):
          $type=PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type=PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type=PDO::PARAM_NULL;
          break;
        default:
          $type=PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param,$value,$type);

  }
  //execute the prepate statement
  public function execute()
  {
return $this->stmt->execute();
  }
  public function fetch()
  {
    $this->execute();
$values = $this->stmt->fetch(PDO::FETCH_ASSOC);
return $values;

  }
  public function fetchall()
  {
    $this->execute();
  $val = $this->stmt->fetchALL(PDO::FETCH_ASSOC);
  return $val;

  }
  public function count()
  {
    $this->execute();
return $this->stmt->rowcount();
  }
}


 ?>
