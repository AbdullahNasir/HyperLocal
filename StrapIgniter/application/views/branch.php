
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" >

    var map;
    $('document').ready(function(){
            initializeMain();
        initialize();
        $('#BranchList').css('height',$(window).height()-70);
        $('#map_canvas').css('height',$(window).height()-70);
    })

    $('window').resize(function(){
        $('#BranchList').css('height',$(window).height()-70);
        $('#map_canvas').css('height',$(window).height()-70);
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


<div class="row-fluid"style="margin-top: 50px;">
    <div class="span4" id="BranchList"  style="padding:10px;border-radius: 15px;overflow: auto">
        <!-- Button to trigger modal -->
        <a href="#myModal" role="button" class="btn" data-toggle="modal">Add New Branch</a>

        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add New Branch</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "POST" action='Regbranch/RegisterBranch'>
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
        <div class="select" id=0>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=1>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=2>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=3>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=4>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=5>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=6>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
        <div class="select" id=7>
            <h2>TenPearls, LLC</h2>
            <h5>Corporate Headquarters</h5>

            <h5>13800 Coppermine Road</h5>
            <h5>Herndon, Virginia 20171</h5>
            <h5>United States of America</h5>

            <h6>Tel: 703-234-5330</h6>
            <h6>Fax: 509-691-7824</h6>
            <h6>Email: info@tenpearls.com</h6>
        </div>
    </div>


    <div class="span5" >
        <div id="map_canvas" style="height: 600px; visibility: hidden"></div>
    </div>
</div>



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


                 console.log($(this).attr('id'));

             })
         </script>

<script type="text/javascript">

    var map;
    var geocoder;
    var marker;

    function initialize() {

        geocoder = new google.maps.Geocoder();

        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("input_map_canvas"),
                mapOptions);

        google.maps.event.addListener(map,'click',function (event) {
            if (marker !=null)
            {
                marker.setMap(null);
            }
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });
            map.setCenter(event.latLng);
            document.getElementById('Lat').value = event.latLng.lat();
            document.getElementById('Long').value = event.latLng.lng();
        });
    }


    function GetGeoCode () {

        document.getElementById('MapDiv').style.display = 'block';
        google.maps.event.trigger(map,'resize');
        var Address = document.getElementById('Address').value;
        geocoder.geocode({'address': Address},function (results,status) {

            if(status == google.maps.GeocoderStatus.OK)
            {
                map.setCenter(results[0].geometry.location);



            }});


    }

</script>