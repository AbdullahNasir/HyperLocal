<?
    class Uploadify extends CI_Controller
    {
        function index()
        {
            $this->load->view('include/header');
            $this->load->view('uploadifyView');
            $this->load->view('include/footer');
        }
        function uploadifyUploader()
        {   
           
           if (!empty($_FILES))
               {
                $ext = ".".pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
                $fname = md5(uniqid(rand(), true));
                $filenameassigned = $fname.$ext;
                $_FILES['Filedata']['name']= $filenameassigned;
                $tempFile = $_FILES['Filedata']['tmp_name'];
                $targetPath = './uploads/';
                $targetFile =  str_replace('//','/',$targetPath) . $filenameassigned;
                $returnObj = new stdClass();
                $returnObj->error = false;
                $returnObj->fileName = $fname;
                $returnObj->fileExt = $ext;
                $returnObj->fullName = "";
                 if ( ! @copy($tempFile,$targetFile))
                        {
                                if ( ! @move_uploaded_file($tempFile,$targetFile))
                                {
                                        $returnObj->error = TRUE;
                                        echo json_encode($returnObj);
                                }
                                else 
                                {
                                    $this->fileManipulation($returnObj->fileExt,$returnObj->fileName.$returnObj->fileExt);
                                    $returnObj->fullName= str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
                                    echo json_encode($returnObj);
                                }
                        }
                 else 
                {
                    $this->fileManipulation($returnObj->fileExt,$returnObj->fileName.$returnObj->fileExt);                    
                    $returnObj->fullName= str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
                    echo json_encode($returnObj);
                }
            } 
        }
        function fileManipulation($extension,$filename)
        {
            
            // you can insert the result into the database if you want.
            if($this->is_image($extension)) 
            {
                $config['image_library']  = 'gd2';
                $config['source_image']	  = './uploads/'.$filename;
                $config['new_image']      = './uploads/thumbs/';
                $config['create_thumb']   = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['thumb_marker']   = '';
                $config['width']	  = 400;
                $config['height']	  = 400;

                $this->load->library('image_lib', $config); 

                $this->image_lib->resize();
               // echo 'image';
            }
            //else //echo 'file';
            return TRUE;
        }

        
        
        private function is_image($imagetype)
        {
            $ext = array(
                '.jpg',
                '.gif',
                '.png',
                '.bmp',
                '.JPG',
                '.jpeg',
                '.JPEG',
                '.GIF',
                '.PNG',
                '.BMP'
            );
            if(in_array($imagetype, $ext)) return true;
            else return false;
        }
    }