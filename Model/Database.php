<?php
class Database{

  private $serverName = "localhost";
  private $userName = "root";
  private $password = "usbw";
  private $dbName = "sgea";

  public function conectar()
  {
    $connection = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
    return $connection;
  }  
 }
?>