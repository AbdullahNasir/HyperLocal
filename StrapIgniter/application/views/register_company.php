
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">

 
 
      
      
      function AddressChanged () {
      
 				   document.getElementById('MapDiv').style.display = 'inline';
 			
 				   
     } 
   	

</script>

<body onload="initialize()">
<div class="hero-unit">
    <div class="row-fluid" style="text-align: center;margin-bottom: 10px;">
        <img class="img-polaroid"  src="http://lorempixel.com/1200/300/business/Hyper-Circle/">
    </div>
    <div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal" action='RegisterCompany' method="POST" id="register_form" >
            
            
            <div id="legend">
                <legend class="">Business? Register here!</legend>
            </div>

            <div class="control-group">
                <!-- CompanyName -->
                <label class="control-label"  for="username">Company Name</label>
                <div class="controls">
                    <input type="text" id="companyname" name="Name" placeholder="" class="input-xlarge">
                   
                </div>
            </div>

            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="text" id="Email" name="Email" placeholder="" class="input-xlarge">
                   
                </div>
            </div>

            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password1">Password</label>
                <div class="controls">
                    <input type="password" id="password1" name="password" placeholder="" class="input-xlarge">
                    <p class="help-block">Password should be at least 4 characters</p>
                </div>
            </div>

            <div class="control-group">
                <!-- Phone -->
                <label class="control-label" for="Phone">Phone</label>
                <div class="controls">
                    <input type="text" id="Phone" name="Phone" placeholder="" class="input-xlarge">
                    
                </div>
            </div>
				
				<div class="control-group">
                <!-- Address -->
                <label class="control-label" for="Address">Address</label>
                <div class="controls">
                    <input type="text" id="Address" name="Address" placeholder="" class="input-xlarge" onchange="GetGeoCode()">
                   
                </div>
            </div>
				
                    <div class="control-group" id="MapDiv" style="display: none">
                    <!-- Map -->
                    <label class="control-label" for="Map">Map</label>
                    <div class="controls">
                        <div id="map_canvas" style="width:300px; height:300px;">
                        </div>
                        <p class="help-block">Please Mark your Address</p>
                    </div>
            </div>
				
				<div class="control-group">
                <!-- Web site -->
                <label class="control-label" for="Website">Website</label>
                <div class="controls">
                    <input type="text" id="Website" name="Website" placeholder="" class="input-xlarge">
                    
                </div>
            </div>
            
            <div class="control-group">
                <!--Facebook Page Address -->
                <label class="control-label" for="email">Facebook Page Link</label>
                <div class="controls">
                    <input type="text" id="Facebook" name="fb" placeholder="" class="input-xlarge">
                    <p class="help-block">Please provide your Facebook Page Address</p>
                </div>
            </div>
            


            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Register</button>
                </div>
            </div>
            
            </fieldset>
            <input type="hidden" name="Lat" id="Lat" style="display: none" />
            <input type="hidden" name="Long" id="Long" style="display: none" />
        </form>
    </div>
    <div class="span3">
        <div class="row-fluid">
        <h3>Companies!</h3>
        <h6>Hyper Circle With Bootstrap 2, the old reset block has been dropped in favor of Normalize.css, a project by Nicolas Gallagher and Jonathan Neal that also powers the HTML5 Boilerplate. While we use much of Normalize within our reset.less, we have removed some elements specifically for Bootstrap.</h6>
        </div>
        <div class="row-fluid">
            <h3>Companies!</h3>
            <h6>Hyper Circle With Bootstrap 2, the old reset block has been dropped in favor of Normalize.css, a project by Nicolas Gallagher and Jonathan Neal that also powers the HTML5 Boilerplate. While we use much of Normalize within our reset.less, we have removed some elements specifically for Bootstrap.</h6>
        </div>
    </div>

</div>
</div>

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
         map = new google.maps.Map(document.getElementById("map_canvas"),
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

<script>

    $('#register_form').submit(function(){

        if( !$('#companyname').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry! </strong>Please Enter A Valid Name!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#Email').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry! </strong>Please Enter A Valid Email!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#password1').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry!</strong>Please Enter A Valid Password!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#Phone').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry!</strong>Please Enter A Valid Phone!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#Address').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry! </strong>Please Enter A Valid Address!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#Website').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry! </strong>Please Enter A Valid Website!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }
        else if( !$('#Facebook').val() )
        {
            var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry! </strong>Please Enter A Valid Facebook ID!'
                    +'</div>';

            $("#register_form").prepend(abc);
            return false;
        }




    });

</script>
</body>