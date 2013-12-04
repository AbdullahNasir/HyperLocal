<div class= "container">
     <div class="row-fluid">
         <div class="span2" >
             <h3>Analytics</h3>
             <a href="<?=base_url('Dashboard/Analytics/Today')?>"><h4>Today</h4></a>
             <a href="<?=base_url('Dashboard/Analytics/Monthly')?>"><h4>Monthly</h4></a>
             <a href="<?=base_url('Dashboard/Analytics/Yearly')?>"><h4>Yearly</h4></a>
         </div>
        <div class="span6" style="border-left: 2px #a9a9a9 solid;">
            <div style="margin-left: 10px">
                <h1 style="font-size: 80px;margin-left: 20px;" ><?=$pageviews?></h1><br/><h3>Number of PageViews</h3>
                <hr/>
            </div>
            <div style="margin-left:10px">
                <h2>Visitors Data</h2>
                <table class="table table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th><h3>Product</h3></th>
                        <th><h3>UserName</h3></th>
                        <th><h3>Country</h3></th>
                        <th><h3>City</h3></th>
                    </tr>

                    </thead>
                    <tbody>
                    <?
                        for($i=0,$j=count($visitors);$i<$j;$i++)
                        {
                            echo "<tr>";
                            echo "<td><h4>".$visitors[$i][0]."</h4></td>";
                            echo "<td><h4>".$visitors[$i][2]."</h4></td>";
                            echo "<td><h4>".$visitors[$i][3]."</h4></td>";
                            echo "<td><h4>".$visitors[$i][4]."</h4></td>";
                            echo "</tr>";
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="span6">

        </div>
    </div>
 </div>
