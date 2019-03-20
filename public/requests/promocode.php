<?php
    include '../../config/db.php';
    include '../includes/functions.php';
    header('Content-Type: application/json');
    session_start();
    if(isset($_SESSION['logged'])){
        // Handling here
        if(isset($_GET['promo'])){

            $promo = getPromoByName(normal($_GET['promo']));
            if($promo && count($promo) > 0 && $promo['coupon_status'] == 'E'){
                if(numberTimeCouponUsed($promo['coupon_ID']) < $promo['coupon_limit']){
                    $toSend = [
                        'success'=> true,
                        'name'=> $promo['coupon_name'],
                        'discount'=> $promo['coupon_discount'],
                        'type'=> $promo['coupon_type']
                    ];
                    echo json_encode($toSend);
                } else {
                    echo json_encode(['error'=>'Promo limit exceeded']);
                }
            } else {
                echo json_encode(['error'=>'Invalid promo code']);
            }
        } else {
            echo json_encode(['error'=>'Invalid request sent']);
        }
    } else {
        echo json_encode(['error'=>'You\'re not authorized to access']);
    }
?>