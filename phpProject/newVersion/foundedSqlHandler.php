<?php

class sqlHandler implements dbHandler
{
  public $table;
  public $link;
// ----------------set connection and table used ----------
  public function __construct($table_name)
  {
    $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->setTable($table_name);
  }

  public function setTable($table)
  {
    $this->table = $table;
  }
  // -------------insertion in DataBase ---------------------- 
  public function insertNewProduct($fileName, $size, $content)
  {
    $sql = "INSERT INTO `products`( `downloadLink`, `size`,'content') VALUES ('$fileName', '$size','$content')";
    return $this->insertQuery($sql);
  }

  public function insertNewUser($email, $password)
  {
    $sql = "INSERT INTO 'users'('email', 'password') VALUES ('$email','$password')";
    return $this->insertQuery($sql);
  }

  public function insertNewOrder($userId,$date,$downloadCounter){
    $sql = "INSERT INTO 'orders'('userId','dateOfDownload', 'downloadCounter') VALUES ('$userId','$date','$downloadCounter')";
    return $this->insertQuery($sql);
  }

  // -------------------selection from Database-------------------
  public function selectRecordById($id)
  {
    $sql = "SELECT * FROM `$this->table` WHERE `id` = $id";
    return $this->SelectQuery($sql);
  }

  public function selectRecords()
  {
    $sql = "SELECT * FROM $this->table";
    return $this->selectQuery($sql);
  }


  // ------------------------- select and insert in DataBase--------- 
  private function selectQuery($sql)
  {
    $result = mysqli_query($this->link, $sql);
    $res = array();
    while ($row = mysqli_fetch_array($result)) {
      $allData[] = $row;
    }
    if (count($allData) === 1) return $allData[0];
    else return $allData;
  }
  private function insertQuery($sql)
  {
    $insert = mysqli_query($this->link, $sql);
    echo "Insertion done perfectly :)";
  }
}
