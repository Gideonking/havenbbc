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

        public function uploadImageFile($file,$storagePath){

        //get file name with extension
        $filenamewithExt = $file->getClientOriginalName();
        //get file name
        $fileName = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        //get ext
        $extension = $file->getClientOriginalExtension();
        //filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload image
        $path = $file->storeAs($storagePath,$fileNameToStore);

        return $fileNameToStore;
        }
    

        public function cropSet($index){
            
        $cropSettings = [ 
            'slides' => [
                        'cropper'=>[
                                'enableExif'=> 'true',
                                'viewport'=>[
                                    'width'=>320,
                                    'height'=>180,
                                    'type'=>'square'
                                ],
                                'boundary'=>[
                                'width'=>320,
                                'height'=>320
                                ]
                            ],    
                        'result'=>[
                                'type'=> 'canvas',
                                'size'=>[
                                    'width'=>1280,
                                    'height'=>720
                                ]
                        ]
                ]
                                ];
        return  $cropSettings[$index];
        }



}