<html>
<head>
    <meta charset="UTF-8">
    <title>Uploadify and Codeigniter Tutorial</title>
    <?php
    $this->load->helper('html');
    echo link_tag('http://localhost/StrapIgniter/uploadify/uploadify.css');
    echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>';
    echo '<script src="http://localhost/StrapIgniter/uploadify/swfobject.js" type="text/javascript"></script>';
    echo '<script src="http://localhost/StrapIgniter/uploadify/jquery.uploadify.v2.1.4.min.js" type="text/javascript"></script>';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href=<?= base_url('assets/css/bootstrap.css') ?> rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
    <link rel="stylesheet" href=<?= base_url('assets/css/bootstrap-responsive.css') ?> >

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/ico/favicon.ico')?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/ico/apple-touch-icon-144-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/ico/apple-touch-icon-114-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('assets/ico/apple-touch-icon-72-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/ico/apple-touch-icon-57-precomposed.png')?>">


    <link href="<?= base_url('assets/js/google-code-prettify/prettify.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/scrollbar.css') ?>" rel="stylesheet">







</head>
<body>
 <div class="row">
<div class="span2">

</div>
<div class="span9" style="margin-top: 50px;">
    <div class="page-header">
        <h1>Popular Products <small>Yup.. All are free!!</small></h1>
        <!-- Button to trigger modal -->
        <a href="#myModal" role="button" class="btn" data-toggle="modal">Add New Branch</a>

        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add New Product</h3>
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
                            <label class="control-label" for="input01">Image</label>
                            <div class="controls">
                            <input type="file" name="file_upload" id="file_upload" />
                            <p class="help-block">Image is better than Text!</p>
                            </div>
                        </div>



                    </fieldset>


            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <input type="submit" value = "Save Product"  class="btn btn-primary"></button>
            </div>
            </form>
        </div>
    </div>

    <ul class="thumbnails">

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>PS Vita</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>Nexus one</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>Samsung 3D TV</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>iPod Case</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>HMX Camcorder</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>Kindle Fire</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>

        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>Kindle Fire</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail">
                <a href="product.html">    <img data-src="holder.js/300x200" alt=""></a>
                <div class="caption">
                    <a href="product.html"> <h5>Kindle Fire</h5></a>  Price: $50.00<br><br>
                </div>
            </div>
        </li>
    </ul>
</div>
 </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#file_upload').uploadify({
            'uploader':   'http://localhost/StrapIgniter/uploadify/uploadify.swf',
            'script':     'http://localhost/StrapIgniter/uploadify/uploadify.php',
            'cancelImg':  'http://localhost/StrapIgniter/uploadify/cancel.png',
            'folder':    '/StrapIgniter/uploads',
            'multi': true,
            'auto'      : true
        });
    });
</script>
</body>
</html>