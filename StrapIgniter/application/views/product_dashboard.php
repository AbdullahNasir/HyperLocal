<link href="<?=base_url('assets/uploadify/css/uploadify.css')?>" rel="stylesheet">
<link href="../assets/css/bootstrap-tagmanager.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../assets/js/bootstrap-tagmanager.js"></script>
<script type="text/javascript" src="../assets/rating/lib/jquery-raty-min.js"></script>

<style>
    .close-local{

    }
</style>

<div class ="container-fluid">
    <?
     if (isset($success))
     {
         if($success  == true)
         {
             echo "<div class='alert alert-success'>"
                     ."<button type='button' class='close' data-dismiss='alert'>×</button>"
                     ."<strong>Well done!</strong>&nbsp;Successfully added!"
                     ."</div>";
         }
         else if ($success == false)
         {
             echo "<div class='alert alert-error'>"
                 ."<button type='button' class='close' data-dismiss='alert'>×</button>"
                 ."<strong>Sorry!</strong>&nbsp;looking into it!"
                 ."</div>";
         }
     }
    ?>

    <div class="row-fluid">
        <div class="span2">
            <h3>Tasks</h3>
            <a href="#addProductModal"    role="button"  data-toggle="modal"><h4>New Product</h4></a>
            <a href="#deleteProductModal" role="button"  data-toggle="modal"><h4>Delete Product</h4></a>
        </div>

        <div class="modal hide fade" id="deleteProductModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">✕</button>
                <h3>Delete Products</h3>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div id="modalTab">
                            <div class="tab-content">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                     <tr>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    for($i=0,$j=count($Products);$i<$j;$i++)
                                    {

                                        echo '<tr data-id="'.$Products[$i][0].'">';
                                            echo '<td>'.$Products[$i][3].'</td>';
                                            echo '<td>'.$Products[$i][7].'</td>';
                                            echo '<td>'.$Products[$i][4].'</td>';
                                           echo '<td><button type="button" data-id="'.$Products[$i][0].'" class="close close-local" style="color: red;">Delete</button></td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal hide fade" id="showProductModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">✕</button>
                <h4 id="showProductModalName">Product Name</h4>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div id="modalTablet">
                            <div class="tab-content">
                                <img class="img-polaroid" id="showProductModalImage" style="margin:0px;max-width: 600px;max-height: 300px;" src="http://lorempixel.com/600/300/technics/Dummy-Product">

                                <h5 id="showProductModalPrice">$500</h5>
                                <div id ="showProductModalRaty" style="margin-right: auto;margin-left: auto;" class="star" data-number="5"></div>

                                <hr/>
                                <h5 id="showProductModalDescription">Description blah blah blah</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="addProductModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">New Product</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "POST"  id='productform'>
                    <fieldset>

                        <div class="control-group">

                            <!-- Text input-->
                            <label class="control-label" for="input01">Product Name</label>
                            <div class="controls">
                                <input id="Name" type="text" Name="Name" placeholder="Enter the Product Name" class="input-xlarge">
                                <p class="help-block">example : Italian Salad</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Text input-->
                            <label class="control-label" for="input01">Price</label>
                            <div class="controls">
                                 <div class="input-prepend">
                                    <input class="input-block-level" Name="Price" id="appendedInput" type="text" placeholder="How much will it cost?" class="input-large">
                                    <span class="add-on">.00</span>
                                </div>
                                <p class="help-block">Bucks are important!</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Text input-->
                            <label class="control-label" for="input01">Description</label>
                            <div class="controls">
                                <input type="text" id="Desc" Name="Description" placeholder="Information about the product" class="input-xlarge">
                                <p class="help-block">Why should people buy this product?</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Tags</label>
                            <div class="controls">
                            <input type="text" autocomplete="off" name="tags" placeholder="Tags" class="tagManager"/>
                                <p class="help-block">You can add tags seperated by a comma. Tags will help
                                people to find your product.
                                </p>
                            </div>
                        </div>
                        
                        <div class="control-group">

                            <label class="control-label" for="input01">Image</label>
                            <div class="controls">
                                <input type="hidden" value="<?=base_url('')?>" id="hiddenBaseUrl"/> 
                                <input type="hidden" value="<?='./uploads/'?>" id="uploadfolder"/>
                                <input type="file" name="file_upload" id="file_upload"  />
                                <p class="help-block">A Picture is better than a 1000 words.</p>
                            </div>
                        </div>
                            
                    </fieldset>


            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <input type="submit" value = "Save"  class="btn btn-primary"></button>
            </div>
            </form>
        </div>

        <div class="span10" style="padding-left:10px;padding-right:10px;border-left:2px #a9a9a9 solid;">
            <h3 style="margin-left: 2%;">Products and Services</h3>
            <?
            for($i=0,$j=count($Products);$i<$j;$i++)
            {

                if($Products[$i][8] == null)
                {
                    echo ' <div class="span3">
                        <a class="showlaunch" data-productname="'.$Products[$i][3].'" data-productimage="http://lorempixel.com/250/300/transport/Dummy-Product" data-productprice="'.$Products[$i][4].'" data-productdescription="'.$Products[$i][7].'" data-productrating="'.$Products[$i][6].'"  href="#showProductModal" role="button"  data-toggle="modal">
                        <img class="img-polaroid" style="height: 250px;width: 300px;margin:0px;" src="http://lorempixel.com/250/300/transport/Dummy-Product">
                        </a>
                        <a class=showlaunch" data-productname="'.$Products[$i][3].'" data-productimage="http://lorempixel.com/250/300/transport/Dummy-Product" data-productprice="'.$Products[$i][4].'" data-productdescription="'.$Products[$i][7].'" data-productrating="'.$Products[$i][6].'"  href="#showProductModal" role="button"  data-toggle="modal"> <h5 style="margin-bottom: 4px;">'.$Products[$i][3].'</h5></a>
                        <p style="margin:0px;"> Price: '.$Products[$i][4].'</p>
                        <div style="margin-bottom:20px;" class="star" data-number="'.$Products[$i][6].'"></div>
                        </div>';
                }
                else
                {
                echo ' <div class="span3">
                        <a class="showlaunch" data-productname="'.$Products[$i][3].'" data-productimage="'.base_url('uploads/thumbs/'.$Products[$i][8]).'" data-productprice="'.$Products[$i][4].'" data-productdescription="'.$Products[$i][7].'" data-productrating="'.$Products[$i][6].'"  href="#showProductModal" role="button"  data-toggle="modal">
                        <img class="img-polaroid" style="height: 250px;width: 300px;margin:0px;" src="'.base_url('uploads/thumbs/'.$Products[$i][8]).'">
                        </a>
                        <a class="showlaunch" data-productname="'.$Products[$i][3].'" data-productimage="'.base_url('uploads/thumbs/'.$Products[$i][8]).'" data-productprice="'.$Products[$i][4].'" data-productdescription="'.$Products[$i][7].'" data-productrating="'.$Products[$i][6].'"  href="#showProductModal" role="button"  data-toggle="modal"> <h5 style="margin-bottom: 4px;">'.$Products[$i][3].'</h5></a>
                        <p style="margin:0px;"> Price: '.$Products[$i][4].'</p>
                        <div style="margin-bottom:20px;" class="star" data-number="'.$Products[$i][6].'"></div>
                        </div>';
                }
            }

            ?>
            </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        

        $('#addProductModal').on('shown', function() {
            $('#addProductModal input[type!="submit"]').val('');
        });
        $('.showlaunch').on('click', function() {
            var productname= $(this).data('productname');
            var productdescription = $(this).data('productdescription');
            var productimage = $(this).data('productimage');
            var productprice = $(this).data('productprice');
            var productraty = $(this).data('productrating');

            //console.log(productname);
            //console.log(productdescription);
            //console.log(productimage);
            //console.log(productprice);
            //console.log(productraty);

            $('#showProductModalImage').attr('src',productimage);
            $('#showProductModalName').text(productname);
            $('#showProductModalPrice').text('$'+productprice);
            $('#showProductModalDescription').text(productdescription);
            $('#showProductModalRaty').raty({readOnly: true,score:productraty});


        });

        $('.close-local').on('click',function(){

            data_id =$(this).data("id");
            $.ajax({
                url:'<?=base_url("Products/DeleteProduct/")?>/'+data_id+'',
                type:'post'
            }).done(function(msg)
                    {
                        console.log(msg);
                        $('tr[data-id="'+data_id+'"]').remove();
                    });
        });

        $('#deleteProductModal').on('hidden', function () {
            //when the modal is closed
            var url = "<?=base_url("Dashboard/Products")?>";
            $(location).attr('href',url);
        })

        jQuery(".tagManager").tagsManager(
                {
                    CapitalizeFirstLetter: true,
                    preventSubmitOnEnter: false,
                    typeahead:false,
                    typeaheadAjaxSource: null,
                    delimeters: [44, 188, 13],
                    backspace: [8],
                    blinkBGColor_1: '#FFFF9C',
                    blinkBGColor_2: '#CDE69C'
                }
        );

        $.fn.raty.defaults.path = '<?=base_url("assets/rating/lib/img")?>';

        $('.star').raty({readOnly: true,
            score: function() {
                return $(this).attr('data-number');
        }});

        var base_url = $('#hiddenBaseUrl').val();
        var uploadfolder = $('#uploadfolder').val();  
        uploadProductImage = '';
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
                response= JSON.parse(response);                
                uploadProductImage = response.fileName+response.fileExt;
                console.log(uploadProductImage);
            }
        });

    });

    

    $('#productform').submit(function(event){
        event.preventDefault();

            if( !$('#Name').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Name!'
                        +'</div>';

                $("#productform").prepend(abc);
                return false;
            }
            else if( !$('#appendedInput').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Price!'
                        +'</div>';

                $("#productform").prepend(abc);
                return false;
            }
            else if( !$('#Desc').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Description!'
                        +'</div>';

                $("#productform").prepend(abc);
                return false;
            }
            else if( !$('input[name=hidden-tags]').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A valid Tag!'
                        +'</div>';

                $("#productform").prepend(abc);
                return false;

            }

            $('#addProductModal').modal('hide');
             $.ajax({

                url: '<?=base_url("Register/RegisterProduct")?>',
                type: 'POST',
                    data :{
                        Name : $('#Name').val(),
                        Price : $('#appendedInput').val(),
                        Desc : $('#Desc').val(),
                        ImgPath:uploadProductImage,
                        Tags : $('input[name=hidden-tags]').val()
                    }
             }).done(function(msg)
                     {
                         if (msg == 'success')
                         {
                             // TODO :redirect to same page
                             var url = "<?=base_url("Dashboard/Products?success=true")?>";
                             $(location).attr('href',url);

                         }
                         else
                         {
                             var url = "<?=base_url("Dashboard/Products?success=false")?>";
                             $(location).attr('href',url);
                         }
                     });
    });

</script>
