<div class="navbar navbar-fixed-top" xmlns="http://www.w3.org/1999/html">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php
            if (session_id() == ''){ session_start();}
            if(isset($_SESSION['id']))
            {
                echo '<a class="brand" href="'.base_url('/Dashboard').'">Hyper Circle</a>';
            }
            else
            {

                echo '<a class="brand" href="'.base_url('').'">Hyper Circle</a>';
            }

            ?>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-shopping-cart"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="<?= base_url("Frontpage/Home") ?>">Profile</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Tasks</li>
                            <li><a href="<?= base_url("Dashboard/Products") ?>">Products</a></li>
                            <li><a href="<?= base_url("Dashboard/Promotions") ?>">Promotions</a></li>
                            <li><a href="<?= base_url("Dashboard/Branches") ?>">Branches</a></li>
                            <li><a href="<?= base_url("Dashboard/Analytics") ?>">Analytics</a></li>

                        </ul>
                    </li>
                </ul>
                <?php
                    @session_start();

                if(isset($_SESSION['id']))
                    {
                       ?>
                        <input id="business_id" type="hidden"  value="<?=$_SESSION['id'];?>"/>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=$_SESSION['Name']?> <strong class="caret"></strong></a>
                                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                    <form method="post" action="<?=base_url('frontpage/Logout')?>" accept-charset="UTF-8">
                                        <input class="btn btn-danger btn-block" type="submit" id="logout" value="Logout">
                                    </form>
                                    <form method="post" action="<?=base_url('frontpage/help')?>" accept-charset="UTF-8">
                                        <input class="btn btn-success btn-block" type="submit" id="help" value="Help">
                                    </form>
                                </div>
                            </li>
                        </ul>


                        <?
                    }
                    else
                    {
                        ?>
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                    <form method="post" id="login_form" action="<?= base_url('Frontpage/Login')?>" accept-charset="UTF-8">
                                        <input style="margin-bottom: 15px;" type="email" placeholder="Username" id="username" name="username">
                                        <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                                        <!--<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                        <label class="string optional" for="user_remember_me"> Remember me</label>-->
                                        <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                                       <!-- <label style="text-align:center;margin-top:5px">or</label>
                                        <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                                        <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">-->

                                    <br/><br/>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    <?php } ?>


                <!--<form class="navbar-form form-search pull-right" method="POST"  accept-charset="UTF-8">
                    <div class="input-append">
                        <input type="text" name="q" class="span3 search-query" placeholder="Search">
                        <button type="submit" class="btn"><i class="icon-search"></i> </button>
                    </div>
                </form>-->
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#login_form').on('submit',function(){

            var login_id = $('#username').val();
            var password = $('#password').val();

            if( !$('#username').val() )
            {
                var abc='<div class="alert alert-error">'
                    +'<button type="button" class="close" data-dismiss="alert">×</button>'
                    +'<strong>Sorry!</strong>Please Enter A Valid Id!'
                    +'</div>';

                $("#login_form").append(abc);
                return false;
            }

            else if ( !$('#password').val() )
            {
                var abc='<div class="alert alert-error">'
                        +'<button type="button" class="close" data-dismiss="alert">×</button>'
                        +'<strong>Sorry!</strong>Please Enter A Valid Password!'
                        +'</div>';

                $("#login_form").append(abc);
                return false;
            }

            return true;
        });


    });
</script>