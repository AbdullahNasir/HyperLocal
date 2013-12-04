<?php

include 'Databaseutil.php';

class Analyticsmodel extends CI_Model
{
    public function AddBusinessPageView($businessID, $date)
    {

        $Query = 'UPDATE analyticsbusinesspageviews SET count= count+1'
        .' WHERE businessID ='.$businessID.
        ' and date="'.$date.'";';
        echo $Query;
        $affected = DatabaseUtil::InsertRecordReturnRowsAffected($Query);
        if($affected == 0)
        {
            $Query = 'insert into analyticsbusinesspageviews (businessID,date)'
                .' values('.$businessID.',"'.$date.'")';
            echo $Query;
            Databaseutil::InsertRecord($Query);
        }
    }

    public function AddProductPageView($productID , $date)
    {

        $Query = 'UPDATE analyticsproductpageviews SET count= count+1'
            .' WHERE businessID =  (SELECT businessID from products where ProductID= '.$productID.')'
            .' and productID ='.$productID.' and date="'.$date.'";';
        echo $Query;
        $affected = DatabaseUtil::InsertRecordReturnRowsAffected($Query);
        if($affected == 0)
        {
            $Query = 'insert into analyticsproductpageviews (businessID,productID,date)'
                .' values( (SELECT businessID from products where ProductID = '.$productID.') , '.$productID.' ,"'.$date.'")';
            echo $Query;
            Databaseutil::InsertRecord($Query);
        }
    }

    public function AddPromotionPageView($promotionID , $date)
    {
        $Query = 'UPDATE analyticspromotionpageviews SET count= count+1'
            .' WHERE businessID =  (SELECT businessID from promotions where PromotionID= '.$promotionID.')'
            .' and promotionID ='.$promotionID.' and date="'.$date.'";';
        echo $Query;
        $affected = DatabaseUtil::InsertRecordReturnRowsAffected($Query);
        if($affected == 0)
        {
            $Query = 'insert into analyticspromotionpageviews (businessID,promotionID,date)'
                .' values( (SELECT businessID from promotions where PromotionID = '.$promotionID.') , '.$promotionID.' ,"'.$date.'")';
            echo $Query;
            Databaseutil::InsertRecord($Query);
        }
    }

    public function AddBusinessPageViewUser($businessID, $userID , $date)
    {

        $Query = 'insert into analyticsbusinesspageviewsuser (businessID,userID,date)'
            .' values('.$businessID.', '.$userID.' ,"'.$date.'")';
        echo $Query;
        Databaseutil::InsertRecord($Query);
    }

    public function AddProductPageViewUser($productID , $userID , $date)
    {

        $Query = 'insert into analyticsproductpageviewsuser (businessID,userID,productID,date)'
            .' values( (SELECT businessID from products where ProductID = '.$productID.') , '.$userID.', '.$productID.' ,"'.$date.';");'
            .' insert into analyticsbusinesspageviewsuser (businessID,userID,date)'
            .' values( (SELECT businessID from products where ProductID = '.$productID.') , '.$userID.' ,"'.$date.'");';
        echo $Query;
        Databaseutil::InsertRecord($Query);
    }

    public function AddPromotionPageViewUser($promotionID , $userID , $date)
    {
        $Query = 'insert into analyticspromotionpageviews (businessID,userID,promotionID,date)'
            .' values( (SELECT businessID from promotions where PromotionID = '.$promotionID.') , '.$userID.', '.$promotionID.' ,"'.$date.'")'
            .' insert into analyticsbusinesspageviewsuser (businessID,userID,date)'
            .' values( (SELECT businessID from promotions where PromotionID = '.$promotionID.') , '.$userID.' ,"'.$date.'");';
        echo $Query;
        Databaseutil::InsertRecord($Query);
    }

   // GET FUNCTIONS

    public function GetTotalBusinessPageViewsByDate($date)
    {
        $Query = 'select count(*) as Count from analyticsbusinesspageviewsuser where date = '.$date;
        $result = mysqli_fetch_array(Databaseutil::RetieveData($Query));
        $result =$result["Count"];
        if(!is_numeric($result))
        {
            $result = 0;
        }
        //echo $result;
        return $result;
    }

    public function GetTotalBusinessPageViewsToday()
    {
        $date = date("Y-m-d");
        $Query = 'select count(*) as Count from analyticsbusinesspageviewsuser where date = "'.$date.'"';
        $result = mysqli_fetch_array(Databaseutil::RetieveData($Query));
        $result =$result["Count"];
        if(!is_numeric($result))
        {
            $result = 0;
        }
        //echo $result;
        return $result;
    }

    public function GetTotalBusinessViewsThisMonth()
    {
        $date = date("Y-m-d", strtotime(date("Y-m-d") ." -1 month"));
        $Query = 'SELECT count(*) as Count FROM analyticsbusinesspageviewsuser'
         .' where date >= "'.$date.'" and date <= "'.date("Y-m-d").'" ';
        echo $Query;
        $result = mysqli_fetch_array(Databaseutil::RetieveData($Query));
        $result =$result["Count"];
        if(!is_numeric($result))
        {
            $result = 0;
        }
        //echo $result;
        return $result;
    }

    public function GetTotalBusinessViewsThisYear()
    {
        $date = date("Y-m-d", strtotime(date("Y-m-d") ." -1 year"));
        $Query = 'SELECT count(*) as Count FROM analyticsbusinesspageviewsuser'
            .' where date >= "'.$date.'" and date <= "'.date("Y-m-d").'" ';
        echo $Query;
        $result = mysqli_fetch_array(Databaseutil::RetieveData($Query));
        $result =$result["Count"];
        if(!is_numeric($result))
        {
            $result = 0;
        }
        //echo $result;
        return $result;
    }

    public function GetUsersWhoVisitedProductToday()
    {
        $date = date("Y-m-d");
        $Query = 'SELECT distinct p.ProductName, u.userID, u.userName, u.Country, u.City,'
        .' u.Email, an.date FROM analyticsproductpageviewsuser an, users u , products p'
        .' where an.date = "'.$date.'" and p.productid = an.productid and an.userID = u.userID';
        //echo $Query;
        $result = Databaseutil::RetieveData($Query);
        $i = 0;
        $UsersArray = array();
        while($row = $result->fetch_row())
        {
            $UsersArray[$i] = $row;
            $i++;
        }
        return $UsersArray;
    }

    public function GetUsersWhoVisitedProductThisMonth()
    {
        $date = date("Y-m-d", strtotime(date("Y-m-d") ." -1 month"));
        $Query = 'SELECT distinct p.ProductName, u.userID, u.userName, u.Country, u.City,'
        .' u.Email,an.date FROM analyticsproductpageviewsuser an, users u, products p '
        .' where an.date >= "'.$date.'" and an.date <= "'.date("Y-m-d").'" '
        .'and p.productid=an.productID and an.userID = u.userID';

        $result = Databaseutil::RetieveData($Query);
        $i = 0;
        $UsersArray = array();
        while($row = $result->fetch_row())
        {
            $UsersArray[$i] = $row;
            $i++;
        }
        return $UsersArray;
    }

    public function GetUsersWhoVisitedProductThisYear()
    {
        $date = date("Y-m-d", strtotime(date("Y-m-d") ." -1 year"));
        $Query = 'SELECT distinct p.ProductName, u.userID, u.userName, u.Country, u.City,'
            .' u.Email,an.date FROM analyticsproductpageviewsuser an, users u, products p '
            .' where an.date >= "'.$date.'" and an.date <= "'.date("Y-m-d").'" '
            .' and p.productid=an.productID and an.userID = u.userID';

        $result = Databaseutil::RetieveData($Query);
        $i = 0;
        $UsersArray = array();
        while($row = $result->fetch_row())
        {
            $UsersArray[$i] = $row;
            $i++;
        }
        return $UsersArray;
    }
}