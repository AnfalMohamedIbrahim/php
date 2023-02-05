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

  public function selectRecordById($id)
  {
    $query = "SELECT * FROM `{$this->table}` WHERE `id` = {$id}";
    return $this->query($query);
  }

  public function selectRecords()
  {
    $query = "SELECT * FROM $this->table";
    return $this->query($query);
  }

  private function query($sql) 
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
}