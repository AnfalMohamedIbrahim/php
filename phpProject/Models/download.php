<?php

class download {
    
       private $count;

      function __constructor($count){
        $count =$this->count;
      }
    public function checkPurchasedUser(){
           
        if($_SESSION['purchased']="true"&& $this->count<=7){
                 
            
        
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

    public function createZipFile(){
        $zipFile = "/".$this->generateRandomName().".zip";
        touch($zipFile);
       return $zipFile;
    }
    
    public function putTheProductInZipFile(){
        $zip  = new ZipArchive;
        $this_zip = $zip->open($this->createZipFile());
        if($this_zip){

            $download = new sqlHandler("products");
          echo $download["downloadLink"];
        }
    }



}