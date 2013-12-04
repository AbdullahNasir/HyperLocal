<script>
    function preload(arrayOfImages) {
        $(arrayOfImages).each(function(){
            $('<img/>')[0].src = this;
            // Alternatively you could use:
            // (new Image()).src = this;
        });
    }

    // Usage:

    preload([
        'assets/img/city1.jpg',
        'assets/img/city2.jpg',
        'assets/img/city3.jpg',
        'assets/img/city4.jpg',
        'assets/img/city5.jpg',
        'assets/img/city6.jpg',
        'assets/img/city7.jpg',
        'assets/img/city8.jpg'
    ]);
</script>

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
        margin: 20px 0;
        text-align: center;
    }
    .jumbotron h1 {
        font-size: 90px;
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


</style>

<div class="container" style="margin-top: 30px;">

        <!-- Jumbotron -->

    <div class="jumbotron">
        <h2>Your City, Your Country, Your Network!</h2>
        <!--<img src="?=base_url('assets/img/hypercircle2.png')?>">-->
        <!--<img src="http://lorempixel.com/986/600/city/Hyper-Circle">-->

        <div id="myCarousel" class="carousel" style="margin-top: 10px;">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="assets/img/city1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city3.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city5.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city6.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city7.jpg" alt="">
                </div>
                <div class="item">
                    <img src="assets/img/city8.jpg" alt="">
                </div>
            </div>
          <!--  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>-->
        </div>
        <h2><p class="lead">Know what's happening around you! What's on sale and Where to go!</p></h2>
        <a class="btn btn-large btn-success" href="<?=base_url('Unit/Landing')?>">For Business</a>
        <a class="btn btn-large btn-primary" href="Register/User">For Users</a>
    </div>
</div> <!-- /container -->

<script>
    $(document).ready(function(){
        $('#myCarousel').carousel({
            interval: 5000
        });
    });

</script>