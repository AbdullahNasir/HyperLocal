<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" >

    var map;
    $('document').ready(function(){

        initializeMain();
        initialize();
        $('#BranchList').css('height',$(window).height()-70);
        $('#map_canvas').css('height',$(window).height()-300);

    })

    $('window').resize(function(){
        $('#BranchList').css('height',$(window).height()-70);
        $('#map_canvas').css('height',$(window).height()-300);
    })

    function initializeMain(){
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map= new google.maps.Map(document.getElementById("map_canvas"),mapOptions);

    }
</script>
<script type="text/javascript">

    function AddressChanged () {

        document.getElementById('MapDiv').style.display = 'inline';


    }


</script>

<div class ="container-fluid">
    <div class="row-fluid">
        <div class="span2" >
            <h3>Tasks</h3>
            <a href="#addBranchModal" role="button" data-toggle="modal"><h4>New Branch</h4></a>
            <a href="#deleteBranchModal" role="button" data-toggle="modal"><h4>Delete Branches</h4></a>
        </div>
        <div id="addBranchModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add New Branch</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "POST" action="<?=base_url('Branch/RegisterBranch')?>">
                    <fieldset>

                        <div class="control-group">

                            <!-- Text input-->
                            <label class="control-label" for="input01">Branch Name</label>
                            <div class="controls">
                                <input type="text" Name="Name" placeholder="Enter the Branch Name" class="input-xlarge">
                                <p class="help-block">example : Microsoft HQ Redmond</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Text input-->
                            <label class="control-label" for="input01">Phone</label>
                            <div class="controls">
                                <input type="text" Name="Phone" placeholder="Enter the Number to Contact" class="input-xlarge">
                                <p class="help-block">Generally people will give you a call</p>
                            </div>
                            <!-- Text input-->
                            <label class="control-label" for="input01">Address</label>
                            <div class="controls">
                                <input type="text" Name="Address" placeholder="Enter the Address"id="Address" class="input-xlarge" onchange="GetGeoCode()">
                                <p class="help-block">Address will help users to find you easily</p>
                            </div>
                        </div>

                        <div class="control-group">

                            <div class="control-group" id="MapDiv" style="display: none">
                                <!-- Map -->
                                <label class="control-label" for="Map">Map</label>
                                <div class="controls">
                                    <div id="input_map_canvas" style="width:300px; height:300px;">
                                    </div>
                                    <p class="help-block">Please Mark your Address</p>
                                </div>


                            </div>
                        </div>


                        <input type="hidden" Name='Lat' id=Lat>
                        <input type="hidden" Name="Long" id=Long>

                    </fieldset>


            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <input type="submit" value = "Save Branch"  class="btn btn-primary"></button>
            </div>
            </form>
        </div>
        <div class="modal hide fade" id="deleteBranchModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">✕</button>
                <h3>Delete Branches</h3>
            </div>
            <div class="modal-body" style="text-align:center;">
                <div class="row-fluid">
                    <div class="span10 offset1">
                        <div id="modalTab">
                            <div class="tab-content">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th>Address</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    for($i=0,$j=count($Branches);$i<$j;$i++)
                                    {

                                        echo '<tr data-id="'.$Branches[$i][0].'">';
                                        echo '<td>'.$Branches[$i][2].'</td>';
                                        echo '<td>'.$Branches[$i][5].'</td>';
                                        echo '<td><button type="button" data-id="'.$Branches[$i][0].'" class="close close-local" style="color: red;">Delete</button></td>';
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
        <div class="span10" style="padding-left:10px;padding-right:10px;border-left:2px #a9a9a9 solid;">
            <div class="span5" id="BranchList" style="padding: 10px; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px; overflow: auto; height: 645px;">

                <?



                for($i=0;$i<count($Branches);$i++)
                {

               echo '<div class="select" id='.$i.' data-dbid="'.$Branches[$i][0].'" data-name="'.$Branches[$i][2].'"  data-lat="'.$Branches[$i][3].'" data-long="'.$Branches[$i][4].'" data-address="'.$Branches[$i][5].'" data-phone="'.$Branches[$i][6].'"style="background-color: silver;">
                    <h2>'.$Branches[$i][2].'</h2>
                    <h5>'.$Branches[$i][5].'</h5>
                    <h6>'.$Branches[$i][6].'</h6>

                </div>';

                }
                ?>
            </div>
            <div class="span5" >
                <div id="map_canvas" style="width:auto; height: 600px; visibility: hidden"></div>
            </div>
         </div>

        </div>
    </div>
</div>
<script type="text/javascript">

    var input_map;
    var geocoder;
    var marker;

    function initialize() {

        geocoder = new google.maps.Geocoder();

        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        input_map = new google.maps.Map(document.getElementById("input_map_canvas"),
                mapOptions);

        google.maps.event.addListener(input_map,'click',function (event) {
            if (marker !=null)
            {
                marker.setMap(null);
            }
            marker = new google.maps.Marker({
                position: event.latLng,
                map: input_map
            });
            input_map.setCenter(event.latLng);
            document.getElementById('Lat').value = event.latLng.lat();
            document.getElementById('Long').value = event.latLng.lng();
        });
    }


    function GetGeoCode () {

        document.getElementById('MapDiv').style.display = 'block';
        google.maps.event.trigger(input_map,'resize');
        var Address = document.getElementById('Address').value;
        geocoder.geocode({'address': Address},function (results,status) {

            if(status == google.maps.GeocoderStatus.OK)
            {
                input_map.setCenter(results[0].geometry.location);



            }});


    }

</script>


<script>
    clickedIndex = -1;
    hoverIndex = 0;
    $('.select').hover(function(){

        hoverIndex = $(this).attr('id');

        if (hoverIndex == clickedIndex);
        else

            $(this).css("background-color", "yellow");


    },function()
    {
        if (clickedIndex !=$(this).attr('id'))
        {
            $(this).css("background-color", "white");

        }
    });
    $('.select').click(function(){

        $('#'+clickedIndex).css("background-color", "white");

        clickedIndex = $(this).attr('id');

        $(this).css("background-color", "silver");
        $('#map_canvas').css('visibility','visible');

        initializeMain();
        console.log($(this).attr('id'));

        var BranchID = $(this).data('dbid');
        var BranchName = $(this).data('name');
        var BranchLat = $(this).data('lat');
        var BranchLong = $(this).data('long');
        var BranchAddress = $(this).data('address');
        var BranchPhone = $(this).data('phone');

        var latLng = new google.maps.LatLng(BranchLat,BranchLong);

        var info_string = '<div>'+
                '<h1>'+BranchName+'<h1>'+
                '<h3>'+BranchPhone+'</h3>'+
                '<h3>'+BranchAddress+'</h3>'+
                '</div>';



        var infowindow = new google.maps.InfoWindow({
            content: info_string,
            maxWidth: 300
        });

        var marker = new google.maps.Marker({
            position:latLng,
            title:BranchName
        });


       marker.setMap(map);
       map.setCenter(latLng);
       google.maps.event.addListener(marker, 'click',function(){
          infowindow.open(map,marker);
       });



    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.close-local').on('click',function(){

            data_id =$(this).data("id");
            $.ajax({
                url:'../Branch/DeleteBranch/'+data_id+'',
                type:'post'
            }).done(function(msg)
                    {
                        console.log(msg);
                        $('tr[data-id="'+data_id+'"]').remove();
                    });
        });

        $('#deleteBranchModal').on('hidden', function () {
            //when the modal is closed
            var url = "../Dashboard/Branches";
            $(location).attr('href',url);
        })
    });
</script>


