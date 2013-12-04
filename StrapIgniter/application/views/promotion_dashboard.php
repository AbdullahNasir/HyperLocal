<link href="<?=base_url('assets/uploadify/css/uploadify.css')?>" rel="stylesheet">
<link href="../assets/css/bootstrap-tagmanager.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../assets/js/bootstrap-tagmanager.js"></script>
<script type="text/javascript" src="../assets/rating/lib/jquery-raty-min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/datepicker.css" />
<script>
    function CSVToArray( strData, strDelimiter )
    {
        strDelimiter = (strDelimiter || ",");
        var objPattern = new RegExp(
                ( "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" + "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +
                  "([^\"\\" + strDelimiter + "\\r\\n]*))"), "gi" );
        var arrData = [[]];
        var arrMatches = null;
        while (arrMatches = objPattern.exec( strData )){
            var strMatchedDelimiter = arrMatches[ 1 ];
            if (strMatchedDelimiter.length && (strMatchedDelimiter != strDelimiter))
            {
                arrData.push( [] );
            }
            if (arrMatches[ 2 ])
            {
                var strMatchedValue = arrMatches[ 2 ].replace(new RegExp( "\"\"", "g" ), "\"" );
            } else {
                var strMatchedValue = arrMatches[ 3 ];
            }
            arrData[ arrData.length - 1 ].push( strMatchedValue );
        }
        return( arrData );
    }


</script>

<div class ="container-fluid">
    <?
    if (isset($success))
    {
        if($success  == true)
        {
            echo "<div class='alert alert-success'>"
                ."<button type='button' class='close' data-dismiss='alert'>×</button>"
                ."<strong>Well done!</strong>&nbsp;Promotion added successfully!"
                ."</div>";
        }
        else if ($success == false)
        {
            echo "<div class='alert alert-error'>"
                ."<button type='button' class='close' data-dismiss='alert'>×</button>"
                ."<strong>Sorry!</strong>&nbsp We are looking into the problem!"
                ."</div>";
        }
    }
    ?>
    <div class="row-fluid">
        <div class="span2" >
            <h3>Tasks</h3>
            <a href="#addPromotionModal" role="button" data-toggle="modal"><h4>New Promotion</h4></a>
            <a href="#deletePromotionModal" role="button" data-toggle="modal"><h4>Delete Promotions</h4></a>
        </div>

        <div class="modal hide fade" id="showPromotionModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">✕</button>
                <h4 id="showPromotionModalName">Promotion Name</h4>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div id="modalTablet">
                            <div class="tab-content">
                                <img class="img-polaroid" id="showPromotionModalImage" style="margin:0px;max-width: 600px;max-height: 300px;" src="http://lorempixel.com/600/300/technics/Dummy-Promotion">
                                <h5>Starting From: <span id="showPromotionStartDate">02-02-2002</span>  and ending on <span id="showPromotionEndtDate">02-02-2002</span> </h5>
                                <h5 id="showPromotionDescription"></h5>
                                <div id ="showPromotionModalRaty" style="margin-right: auto;margin-left: auto;" class="star" data-number="5"></div>
                                <hr/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal hide fade" id="deletePromotionModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">✕</button>
                <h3>Delete Promotions</h3>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div id="modalTab">
                            <div class="tab-content">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Promotion Name</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    for($i=0,$j=count($Promotions);$i<$j;$i++)
                                    {

                                        echo '<tr data-id="'.$Promotions[$i][0].'">';
                                        echo '<td>'.$Promotions[$i][2].'</td>';
                                        echo '<td>'.$Promotions[$i][8].'</td>';
                                        echo '<td><button type="button" data-id="'.$Promotions[$i][0].'" class="close close-local" style="color: red;">Delete</button></td>';
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

        <div id="addPromotionModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">New Promotion</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "POST"  id='promotionform'>
                    <fieldset>

                        <div class="control-group">

                            <!-- Text input-->
                            <label class="control-label" for="input01">Promotion Name</label>
                            <div class="controls">
                                <input id="Name" type="text" Name="Name" placeholder="Enter the Promotion Name" class="input-xlarge">
                                <p class="help-block">example : Salad Mania: Get 5% Discount!</p>
                            </div>
                        </div>


                        <div class="control-group">
                            <!-- Text input-->
                            <label class="control-label" for="input01">Description</label>
                            <div class="controls">
                                <input type="text" id="Desc" Name="Description" placeholder="Information about the Promotion" class="input-xlarge">
                                <p class="help-block">What is in this Promotion?</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Branches</label>
                            <div class="controls">
                                <div class="ForBranches">
                                    <input id="tagsman2" type="text" name="Branches" placeholder="Branches" class="tagManager"/>
                                    <p class="help-block">Add Branches separated by a comma.
                                    </p>
                                </div>
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
                        
                        <div class="control-group">
                            <label class="control-label">Start Date</label>
                            <div class="controls">
                                <div class="input-append date" id="datepicker1" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd-mm-yyyy">
                                    <input type="text" name="start_date" data-bind="value: Customer.DateOfBirth" />
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                                <p class="help-block">The Date the promotion will start.</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">End Date</label>
                            <div class="controls">
                                <div class="input-append date" id="datepicker2" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd-mm-yyyy">
                                    <input type="text" name="end_date" data-bind="value: Customer.DateOfBirth" />
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                                <p class="help-block">The Date the promotion will start.</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Tags</label>
                            <div class="controls">
                                <div class="ForTags">
                                    <input id="tagsman1" type="text" name="tags" placeholder="Tags"  autocomplete="off" class="tagManager"/>
                                    <p class="help-block">Tags will help  people to find your Promotion.</p>
                                </div>
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
            <h3 style="margin-left: 2%;">Promotions</h3>

            <?

            for ($i=0;$i<count($Promotions);$i++)
            {
                if($Promotions[$i][3] == null)
                {
                    echo ' <div class="span3">
                        <a class="showlaunch" data-promotiondesc="'.$Promotions[$i][8].'"  data-promotiontext="'.$Promotions[$i][2].'" data-promotionimage="http://lorempixel.com/250/300/cats/Dummy-Promotion" data-promotionvalidfrom="'.$Promotions[$i][4].'" data-promotionrating="'.$Promotions[$i][7].'" data-promotionvalidtill="'.$Promotions[$i][5].'" href="#showPromotionModal" role="button"  data-toggle="modal">
                        <img class="img-polaroid" style="height: 250px;width: 300px;margin:0px;" src="http://lorempixel.com/250/300/cats/Dummy-Product">
                        </a>
                        <a class="showlaunch" data-promotiondesc="'.$Promotions[$i][8].'"  data-promotiontext="'.$Promotions[$i][2].'" data-promotionimage="http://lorempixel.com/250/300/cats/Dummy-Promotion" data-promotionvalidfrom="'.$Promotions[$i][4].'" data-promotionrating="'.$Promotions[$i][7].'" data-promotionvalidtill="'.$Promotions[$i][5].'" href="#showPromotionModal" role="button"  data-toggle="modal"><h5 style="margin-bottom: 4px;">'.$Promotions[$i][2].'</h5></a>
                         <div style="margin-bottom:20px;" class="star" data-number="'.$Promotions[$i][7].'"></div>
                        </div>';
                }
                else
                {
                    echo ' <div class="span3">
                        <a class="showlaunch" data-promotiondesc="'.$Promotions[$i][8].'"  data-promotiontext="'.$Promotions[$i][2].'" data-promotionimage="'.base_url('uploads/thumbs/'.$Promotions[$i][3]).'" data-promotionvalidfrom="'.$Promotions[$i][4].'" data-promotionrating="'.$Promotions[$i][7].'" data-promotionvalidtill="'.$Promotions[$i][5].'" href="#showPromotionModal" role="button"  data-toggle="modal">
                        <img class="img-polaroid" style="height: 250px;width: 300px;margin:0px;" src="'.base_url('uploads/thumbs/'.$Promotions[$i][3]).'">
                        </a>
                        <a class="showlaunch" data-promotiondesc="'.$Promotions[$i][8].'"  data-promotiontext="'.$Promotions[$i][2].'" data-promotionimage="'.base_url('uploads/thumbs/'.$Promotions[$i][3]).'" data-promotionvalidfrom="'.$Promotions[$i][4].'" data-promotionrating="'.$Promotions[$i][7].'" data-promotionvalidtill="'.$Promotions[$i][5].'" href="#showPromotionModal" role="button"  data-toggle="modal"><h5 style="margin-bottom: 4px;">'.$Promotions[$i][2].'</h5></a>
                         <div style="margin-bottom:20px;" class="star" data-number="'.$Promotions[$i][7].'"></div>
                        </div>';
                }
            }

            ?>
        </div>
    </div>
</div>


    <script>
        $('#datepicker1').datepicker();
        $('#datepicker2').datepicker();


        $(document).ready(function(){
           // jQuery("#tagsman1").tagsManager();
            //jQuery("#tagsman2").tagsManager();

            $('#addPromotionModal').on('shown', function() {
                $('#addPromotionModal input[type!="submit"]').val('');
            });
            $('.showlaunch').on('click', function() {
                var promotiontext= $(this).data('promotiontext');
                var promotionimage = $(this).data('promotionimage');
                var promotionstartdate= $(this).data('promotionvalidfrom');
                var promotionenddate = $(this).data('promotionvalidtill');
                var promotionraty = $(this).data('promotionrating');
                var promotiondescription = $(this).data('promotiondesc');

                $('#showPromotionModalImage').attr('src',promotionimage);
                $('#showPromotionModalName').text(promotiontext);
                $('#showPromotionStartDate').text(promotionstartdate);
                $('#showPromotionEndDate').text(promotionenddate);
                $('#showPromotionModalRaty').raty({readOnly: true,score:promotionraty});
                $('#showPromotionDescription').text(promotiondescription);


            });


            $('.close-local').on('click',function(){

                data_id =$(this).data("id");
                $.ajax({
                    url:'<?=base_url("Promotions/DeletePromotion/")?>/'+data_id+'',
                    type:'post'
                }).done(function(msg)
                        {
                            console.log(msg);
                            $('tr[data-id="'+data_id+'"]').remove();
                        });
            });

            $('#deletePromotionModal').on('hidden', function () {
                //when the modal is closed
                var url = "../Dashboard/Promotions";
                $(location).attr('href',url);
            })



            $.fn.raty.defaults.path = '<?=base_url("assets/rating/lib/img")?>';

            $('.star').raty({readOnly: true,
                score: function() {
                    return $(this).attr('data-number');
                }});



            BranchesList = {};
            Branches=[];
            BusinessID=$('#business_id').val();
            $.getJSON('../Branch/GetBranches/'+BusinessID,function(data){

                $.each(data, function(index,itemdata){
                    Branches.push(index);
                    BranchesList[index]=itemdata;
                });
                console.log(Branches);

            }).done(function(){

                        $("#tagsman2").tagsManager({
                            //prefilled: [],
                            CapitalizeFirstLetter: false,
                            preventSubmitOnEnter: true,
                            typeahead: true,
                            typeaheadAjaxSource: null,
                            delimeters: [44, 188, 13],
                            backspace: [8],
                            blinkBGColor_1: '#FFFF9C',
                            blinkBGColor_2: '#CDE69C',
                            typeaheadSource: Branches
                        });

                    });


            var base_url = $('#hiddenBaseUrl').val();
            var uploadfolder = $('#uploadfolder').val();  
            uploadPromotionImage = '';
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
                    uploadPromotionImage = response.fileName+response.fileExt;
                    console.log(uploadPromotionImage);
                }
            });


        });

        $(function () {
            $("#tagsman1").tagsManager({
                prefilled: [],
                CapitalizeFirstLetter: false,
                preventSubmitOnEnter: false,
                delimeters: [44, 188, 13],
                backspace: [8],
                blinkBGColor_1: '#FFFF9C',
                blinkBGColor_2: '#CDE69C'

            });

            //$("#tagsman1").tagsManager({ );

        });


        //form submit
        $('#promotionform').submit(function(event){

            event.preventDefault();
            if( !$('#Name').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Name!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;
            }
            else if( !$('input[name="start_date"]').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Start Date!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;
            }
            else if( !$('input[name="end_date"]').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid End Date!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;
            }
            else if( !$('#Desc').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A valid Description!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;

            }
            else if( !$('.ForBranches input[name=hidden-Branches]').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A valid Branch!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;

            }
            else if( !$('.ForTags input[name=hidden-tags]').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A valid Tag!'
                        +'</div>';

                $("#promotionform").prepend(abc);
                return false;

            }

            idarr=[];
            event.preventDefault();

            csv = $('.ForBranches input[name=hidden-Branches]').val();
            arr = CSVToArray(csv);
            $.each(arr[0] ,function(index,value){
                idarr.push(BranchesList[value]);
            });
            BranchIds = "";

            $.each(idarr , function(index,value){
                if(index == 0)
                {
                    BranchIds += value.toString();
                }
                else
                {
                    BranchIds += ","+(value.toString());
                }
            });

            //console.log(BranchIds);

            $('#addPromotionModal').modal('hide');
            //console.log(uploadPromotionImage);
            $.ajax({

                url     :   '<?=base_url("Register/RegisterPromotion")?>',
                type    :   'POST',
                data    :   {

                    promotionText : $('#Name').val(),
                    validFrom : $('input[name="start_date"]').val(),
                    validTill : $('input[name="end_date"]').val(),
                    promotionDescription : $('#Desc').val(),
                    ImgPath: uploadPromotionImage,
                    Branches: BranchIds,
                    Tags : $('.ForTags input[name=hidden-tags]').val()

            }}).done(function(msg){
                        //console.log(msg);
                        if (msg == 'success')
                        {
                            // TODO :redirect to same page
                            var url = '<?=base_url("Dashboard/Promotions?success=true")?>';
                            $(location).attr('href',url);

                        }
                        else

                        {
                            var url = '<?=base_url("Dashboard/Promotions?success=false")?>';
                            $(location).attr('href',url);
                        }
                    });
            return false;
        });






    </script>
