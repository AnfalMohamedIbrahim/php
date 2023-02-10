<?php

class download {
    
       private $count;
       private $pressedKeyCounter;

      function __constructor($count){
        $this->count = $count;
        $this->pressedKeyCounter = $_SESSION['pressedKeyCounter'];

      }
    public function checkedPurchasedUser(){
           
        if($_SESSION['purchased']="true"&&  $_SESSION["dowloadCount"]<=7&& $_SESSION['pressedKeyCounter']<=7){
             
           return  $_SESSION["dowloadCount"] = $this->count++;
        
        }
      }

    public  function generateRandomName(){
        $characters = array ('0','1','2','3','4','5','6','7','8','9',
                'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
          'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
                         );
                    shuffle($characters);
                return implode("", array_slice($characters, 0,10));
    }
    public function getDownloadedFiles () {
             
    }

    public function downloadZipFile($_data){
      // to give myself the privilege to be unrestricted 
       $old = umask(0);
       chmod("./downloads/", 0755);
     
      if (file_exists($_data)) {
        header('Content-Description: File Transfer');
        header('Content-    : application/zip');
        header('Content-Disposition: attachment; filename="'.basename($_data).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($_data));
      $zip=  readfile($_data);
    }
      return $zip;
  }
  public function writeZipFile ($_zip){
    $zipFile  = new ZipArchive;
    $this_zip = $this->$zipFile->open($this->createZipFile());

      $zipFile = "/".$this->generateRandomName().".zip";
      
  }
      
       
     
    
    public function putTheProductInZipFile(){
       

        if($this_zip){

            $download = new sqlHandler("products");
          echo $download["downloadLink"];
        }
    }

    

}