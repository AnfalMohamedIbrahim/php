<?php

interface dbHandler
{
  public function setTable($table);
  public function selectRecordById($id);
  public function selectRecords();
}