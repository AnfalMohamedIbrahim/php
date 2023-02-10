<?php





class upload {
    private $filename;
     private $destination;
     private  $extension ;
     private  $file;
     private $size;

    function __constructor(){
        $this->filename = isset($_FILES['myfile']['name'])?$_FILES['myfile']['name']:"You didn't upload any file yet.";
        $this->destination = SITE_ROOT .'\\'. $this->filename;
        $this->extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        $this->file =isset($_FILES['myfile']['tmp_name'])?$_FILES['myfile']['tmp_name']:"You didn't upload any file yet.";
        $this->size =isset($_FILES['myfile']['size'])?$_FILES['myfile']['size']:"You didn't upload any file yet.";
    }

    public function checkZipFile(){
      if(!in_array($this->extension, ['zip'])){
       echo "your uploaded file isn't a zip file";
    }
    else {
        return $this->extension;
    }
    }

    public function transferFileFromTempAndUpload (){
                if (move_uploaded_file($this->file, $this->destination)) {
              echo $this->filename; 
                echo "File uploaded successfully";
            }
        else {
            echo "Failed to upload file.";
        }
        return $this->filename;
    }
    public function getSize(){
        return $this->size;
    }


    

}