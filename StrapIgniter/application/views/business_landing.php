
<style type="text/css">
    body {
        padding-top: 20px;
        padding-bottom: 60px;
    }

        /* Custom container */
    .container {
        margin: 0 auto;
        max-width: 1000px;
    }
    .container > hr {
        margin: 60px 0;
    }

        /* Main marketing message and sign up button */
    .jumbotron {
        margin: 80px 0;
        text-align: center;
    }
    .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
    }
    .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
    }
    .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
    }

        /* Supporting marketing content */
    .marketing {
        margin: 60px 0;
    }
    .marketing p + h4 {
        margin-top: 28px;
    }


        /* Customize the navbar links to be fill the entire space of the .navbar */
    .navbar .navbar-inner {
        padding: 0;
    }
    .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
    }
    .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
    }
    .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
    }
    .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
    }
    .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
    }
    body
    {
        background-color:rgb(224, 219, 219);
    }

</style>
<div style="margin-left: auto;margin-right: auto;width: 300px;">
    <a href="../" style="text-decoration: none"><h1><p class="">Hyper Circle!</p></h1></a>
    <br/>
</div>
<div class="wrap">
<div class="container">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li id="li_what" class="active"><a id="nav_what" href="#">What is HyperCircle?</a></li>
                        <li id="li_why"><a id="nav_why" href="#">Why choose us?</a></li>
                        <li id="li_started"><a id="nav_started" href="#">Get started !</a></li>
                        <li id="li_signup"><a id="nav_signup" href="#">SignUp! Its Free</a></li>
                        <li id="li_login"><a id="nav_login" href="#">Login!</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.navbar -->


    <div class="row-fluid" id="main-frame" style="">
        <img src="../assets/img/hypercircle.png">
    </div>

    <br/><br/>
    <div class="row-fluid" id="frame" style="">
    <a href="../"> <img  src="../assets/img/botom.png"/></a><br/>

    </div>
        <!-- Example row of columns -->
</div>





</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>

<script>
    $('#nav_what').on('click',function (e){
       $('#main-frame').empty().fadeToggle().append(' <img src="../assets/img/hypercircle.png">').fadeToggle();
       $('#li_what').attr('class','active');
       $('#li_why').attr('class','');
       $('#li_started').attr('class','');
       $('#li_login').attr('class','');
       $('#li_signup').attr('class','');
    });

    $('#nav_why').on('click', function (e) {
        $('#main-frame').empty().fadeToggle().append('<div class="row-fluid"><div class="span6" style="background-color: white;border:1px lightgrey solid; padding: 10px;border-radius: 10px;"><img style="width: 500px;height: 300px;" src="../assets/img/maps.jpg"><h2>Grow with Maps!</h2><p>Users can locate your business while in your area. Search your products, get the best out of you, more locally.!</p></div><div class="span6" style="background-color: white;border:1px lightgrey solid; padding: 10px;border-radius: 10px;"><img style="width: 500px;height: 300px;" src="../assets/img/target.jpg"><h2>Know your Audience!</h2><p> Identify your audience. Target the Customers ever more simply. Delivering them what they need, when they need and where they need it! literally, Hyper locally !</p></div></div>').fadeToggle();
        $('#li_what').attr('class','');
        $('#li_why').attr('class','active');
        $('#li_started').attr('class','');
        $('#li_login').attr('class','');
        $('#li_signup').attr('class','');
    });

    $('#nav_started').on('click', function (e) {
        $('#main-frame').fadeToggle().empty().append(' <img src="../assets/img/hypercircle2.png">').fadeToggle();
        $('#li_what').attr('class','');
        $('#li_why').attr('class','');
        $('#li_started').attr('class','active');
        $('#li_login').attr('class','');
        $('#li_signup').attr('class','');

    });
    $('#nav_signup').on('click', function (e) {
        $('#main-frame').fadeToggle().empty().append('<div class="jumbotron"><h1>Hyper Circle!</h1><p class="lead">The only business network on the planet. Connect and go International hyper-locally !</p><a class="btn btn-large btn-success" href="../Register/Company">Sign up today</a></div>').fadeToggle();
        $('#li_what').attr('class','');
        $('#li_why').attr('class','');
        $('#li_started').attr('class','');
        $('#li_login').attr('class','');
        $('#li_signup').attr('class','active');

    });

    $('#nav_login').on('click', function (e) {
        $('#main-frame').fadeToggle().empty().append('<div class="jumbotron"><form class="form-horizontal" action="../frontpage/login" method="POST"><fieldset><div id="legend"></div><div class="control-group"><label class="control-label"  for="username">Username</label><div class="controls"><input type="text" id="username" name="username" placeholder="" class="input-xlarge"></div></div><div class="control-group"><label class="control-label" for="password">Password</label><div class="controls"><input type="password" id="password" name="password" placeholder="" class="input-xlarge"></div></div><div class="control-group"><div class="controls"><button class="btn btn-success">Login</button></div></div></fieldset></form></div>').fadeToggle();
        $('#li_what').attr('class','');
        $('#li_why').attr('class','');
        $('#li_started').attr('class','');
        $('#li_login').attr('class','active');
        $('#li_signup').attr('class','');

    });
</script>
</body>
</html>
