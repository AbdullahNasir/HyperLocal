<!--<!DOCTYPE html>
<html>
    <head>
        <title>Uploadify with CodeIgniter</title>
        <link href="<?=base_url('assets/uploadify/css/uploadify.css')?>" rel="stylesheet">
       
    </head>
    <body>
         -->
        
        <form method="POST" action=""> 
            <div class="well" style="padding: 14px 19px;">
              <input id="file_upload" name="file_upload" type="file" />

              <input type="hidden" value="<?=base_url('')?>" id="hiddenBaseUrl"/> 
              <input type="hidden" value="<?='./uploads/'?>" id="uploadfolder"/>
              <a href="javascript:$('#file_upload').uploadifyUpload();" class="btn large primary">Upload Files</a>
              <div id="displayFiles"></div>
            </div>
        </form>
        
     <!--
     <script type="text/javascript" src="<?=base_url('assets/uploadify/js/jquery-1.4.2.min.js')?>"></script>
     <script type="text/javascript" src="<?=base_url('assets/uploadify/js/swfobject.js')?>"></script>
     <script type="text/javascript" src="<?=base_url('assets/uploadify/js/jquery.uploadify.v2.1.4.min.js')?>"></script>
     <script type="text/javascript" src="<?=base_url('assets/uploadify/js/vortexdev.js')?>"></script>
   
    
    </body>
    
</html>
 -->