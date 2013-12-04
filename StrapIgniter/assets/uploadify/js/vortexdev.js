// created by vortexdev.netii.net
$(document).ready(function() {
    
  var base_url = $('#hiddenBaseUrl').val();
  var uploadfolder = $('#uploadfolder').val();  
  $('#file_upload').uploadify({
    'uploader'  : base_url + 'assets/uploadify/flash/uploadify.swf',
    'script'    : base_url + 'index.php/uploadify/uploadifyUploader/',
    'cancelImg' : base_url + 'assets/uploadify/css/cancel.png',
    'folder'    : uploadfolder,
    'fileExt'     : '*.jpg;*.gif;*.png;*.zip;*.rar;*.flv;*.mp4;*.mp3',
    'auto'      : true,
    'multi'     : false,
    'method'  : 'post',
    'scriptData': {'hello':'sir'},
     'onComplete'  : function(event, ID, fileObj, response, data) {
        console.log(response);
    }
  });
  
 
});