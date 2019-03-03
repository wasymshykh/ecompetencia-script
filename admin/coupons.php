<?php 
    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';

    $show = false;
    $showEdit = false;
    $error='';

    if(isset($_GET['toggle'])){
        if(!($_SESSION['management']['management_type'] === 'A')){
            header('location: '.ADMIN_URL.'/coupons.php');
        }
        else {
            $toggle = (int)normal($_GET['toggle']);
            $theCoupon = getCoupon($toggle);
            if(!empty($theCoupon)) {
                if($theCoupon['coupon_status'] == 'E'){
                    $status = 'D';
                } else{
                    $status = 'E';
                }
    
                $query = "UPDATE `coupons` SET `coupon_status` = '$status' WHERE `coupon_ID`=$toggle";
                $stmt = $db->prepare($query);
                if($stmt->execute()){
                    header('location: coupons.php');
                } else {
                    $error_update = "Sorry, couldn't toggle the coupon status!";
                }
            }
            
        }

    }

    if(isset($_GET['edit'])){

        $coup_success = false;
        $coup_error = false;
        $coupon = getCoupon(normal($_GET['edit']));


        if(!empty($coupon) && count($coupon) > 0) {
            $showEdit = true;
        }

        if(isset($_POST['edit_coupon'])){

            $u_name = normal($_POST['coup_name']);
            $u_type = normal($_POST['coup_type']);
            $u_discount = (int)normal($_POST['coup_discount']);
            
            if(empty($u_name) || strlen($u_name) < 2) {
                $coup_error = "Name can't be empty and greater than one character!";
            }
            if(empty($coup_error) && $u_type == "P"){
                if($u_discount > 100){
                    $coup_error = "Percentage discount cannot be greater than 100";
                }
            }
            if(empty($coup_error) && $u_discount < 1) {
                $coup_error = "Discount must be greater than 1";
            }
            
            if(empty($coup_error)) {
                $query = "UPDATE `coupons` SET `coupon_name`='$u_name', `coupon_discount`=$u_discount, `coupon_type`='$u_type'  WHERE `coupon_ID`=".$coupon['coupon_ID'];
                $stmt = $db->prepare($query);
                if($stmt->execute()) {
                    $coup_success = "Successfully Updated!";
                    $coupon = getCoupon(normal($_GET['edit']));
                } else {
                    $coup_error = "Couldn't update the coupon";
                }
    
            }

        }


    }

    if(isset($_POST['add_coupon'])) {

        $name = normal($_POST['coupon_name']);
        $limit = (int)normal($_POST['coupon_limit']);
        $type = normal($_POST['coupon_type']);
        $discount = (int)normal($_POST['coupon_discount']);

        if($type == "P"){
            if($discount > 100){
                $error = "Percentage discount cannot be greater than 100";
                $show = true;
            }
        }
        if(empty($error) && $limit < 1) {
            $error = "Limit must be greater than 1";
            $show = true;
        }
        if(empty($error) && $discount < 1) {
            $error = "Discount must be greater than 1";
            $show = true;
        }

        if(empty($name) || strlen($name) < 2) {
            $error = "Name can't be empty and greater than one character!";
        }

        if(empty($error)) {
            
            $query = "INSERT INTO `coupons`(`coupon_name`, `coupon_discount`, `coupon_type`, `coupon_status`, `times_used`, `coupon_limit`)
            VALUE ('$name', $discount, '$type', 'E', 0, $limit)";

            $stmt = $db->prepare($query);
            if($stmt->execute()) {
                header('location: coupons.php');
            } else {
                $error = "Couldn't add the coupon";
                $show = true;
            }

        }
    
    }

?>
<?php 
  $page_title = "Coupon Codes";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    include 'views/admin/coupons.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>