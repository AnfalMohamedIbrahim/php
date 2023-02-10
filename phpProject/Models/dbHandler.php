<?php

interface dbHandler
{
  public function setTable($table);
  public function selectRecordById($id);
  public function selectRecords();
  public function insertNewUser($email,$password,$subscriptionDate);
  public function insertNewProduct($fileName,$size,$editedAt);
  public function newOrder($userId,$downloadsCounter);
}