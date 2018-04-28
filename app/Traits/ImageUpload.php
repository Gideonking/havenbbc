<?php
namespace App\Traits;

trait ImageUpload{

    public function uploadImageBase64($data,$path,$name,$ftype){
            list($type, $data) = explode(';',$data);
            list(, $data) = explode(',',$data);

            $newdata = base64_decode($data);
            //filename to store
            $fileNameToStore = $name.'_'.time().'.'.$ftype;
            if(!file_exists($path))
                mkdir($path,0777,true);

             //   dd($data);
            //upload image
            $full_path = $path . $fileNameToStore;
           if(file_put_contents($full_path,$newdata) > 0)
           return $fileNameToStore;
           else
           return false;

         }
    
}