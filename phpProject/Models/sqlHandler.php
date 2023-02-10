<?php

Class sqlHandler implements dbHandler
{
  public $table;
  public $link;

  public function __construct($table_name)
  {
    $this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->setTable($table_name);
  }

  public function setTable($table)
  {
    $this->table = $table;
  }
// -------------------------------insertion into DB
  public function insertNewUser($email,$password,$subscriptionDate){
    $sql = "insert into 'users' ('email','password','subscriptionDate') values ('$email','$password','$subscriptionDate')";
    return $this->insertData($sql);
  }

  public function insertNewProduct($fileName, $size, $editedAt)
  {
    $sql = "insert into 'users' ('email','password','subscriptionDate') values ('($fileName','$size','$editedAt')";
    
    return $this->insertData($sql);
  }
  
  public function newOrder($userId,$downloadsCounter){
    $sql = "insert into 'orders' ('userId','productId','downloadsCounter') values ('$userId','1','$downloadsCounter')";
    
    return $this->insertData($sql);
  }


  // ----------------------------------select from DB

  public function selectRecordById($id)
  {
    $query = "SELECT * FROM `{$this->table}` WHERE `id` = {$id}";
    return $this->selectData($query);
  }

  public function selectRecords()
  {
    $query = "SELECT * FROM $this->table";
    return $this->selectData($query);
  }


  private function selectData($sql) 
  {
    $result = mysqli_query($this->link, $sql);
    $res = array();
    while($row = mysqli_fetch_array($result))
    {
      $res [] = $row;
    }
    if (count($res) === 1) return $res[0];
    else return $res;
  
  }
// ----------------------------------- query sent 
  private function insertData($sql){
    if(!empty($sql)){
      mysqli_query($this->link, $sql);
      echo "the Insertion done perfectly ";
    }
    else{
      mysqli_error($sql);
    }
  }
}