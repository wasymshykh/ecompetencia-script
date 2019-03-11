<?php
    // normalize inputs
    function normal($data) {
        if(gettype($data) !== "array"){
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }
        return '';
    }

    function back($data)
    {
        if(gettype($data) !== "array"){
            return htmlspecialchars_decode($data, ENT_QUOTES);
        }
        return '';
    }

    // returns true if page is disabled
    function isPageDisabled($page) {
        global $db;
        $q = "SELECT `setting_value` FROM `site_settings` WHERE `setting_name`=:page";
        $s = $db->prepare($q);
        $s->execute(['page'=>$page]);
        $r = $s->fetch();
        if($r['setting_value'] == "false"){
            return true;
        }
        return false;
    }

    // Records logger's provided text
    function logger($text)
    {
        global $db;
        $q = "INSERT INTO `loggers` (`logger_text`) VALUE (:ltext)";
        $s = $db->prepare($q);
        if($s->execute(['ltext'=>$text])){
            return true;
        }
        return false;
    }


    function updateUserPassword($email, $password, $code) {
        global $db;
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $q = "UPDATE `users` SET `user_password`=:pass WHERE `user_email`=:email";
        $s = $db->prepare($q);
        
        if($s->execute(['email'=>$email, 'pass'=>$hashed_password]) && resetCodeUpdate($code)){
            return true;
        }
        return false;
    }
    
    // returns true if team code exists
    function resetCodeUpdate($code) {
        global $db;
        $q = "UPDATE `reset_requests` SET `reset_status`='U', `reset_completed_on`=NOW() WHERE `reset_code`=:code";
        $s = $db->prepare($q);

        if($s->execute(['code'=>$code])){
            return true;
        }
        return false;
    }


    // returns true if team code exists
    function validResetCode($email, $code) {
        global $db;
        $q = "SELECT `reset_code` FROM `reset_requests` WHERE `reset_code`=:reset_code AND `user_email`=:email AND `reset_status`='N'";
        $s = $db->prepare($q);
        $s->execute(['reset_code'=>$code,'email'=>$email]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }

    // returns true if team code exists
    function resetCodeExists($code) {
        global $db;
        $q = "SELECT `reset_code` FROM `reset_requests` WHERE `reset_code`=:reset_code AND `reset_status`='N'";
        $s = $db->prepare($q);
        $s->execute(['reset_code'=>$code]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }
    
    // returns true if team email exists
    function userEmailExists($email) {
        global $db;
        $q = "SELECT `user_email` FROM `users` WHERE `user_email`=:email";
        $s = $db->prepare($q);
        $s->execute(['email'=>$email]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }

    // getting list of available institute
    function getInstitutes() {
        global $db;
        $q = "SELECT * FROM `institutes` WHERE `institute_status`='E' ORDER BY `institute_name` ASC";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }
    // returns true if valid institute id is passed
    function isValidInstitute($id) {
        global $db;
        $q = "SELECT * FROM `institutes` WHERE `institute_status`='E' AND `institute_ID`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }

    function userLoginDetailsCheck($entered_email, $entered_password) {
        $user = getUserByEmail($entered_email);
        if(count($user) > 0){
            if($user['user_status'] == 'E'){
                if(password_verify($entered_password, $user['user_password'])){
                    return true;
                }
            } else {
                return false;
            }
        }

        return false;
    }

    function getUserByEmail($email) {
        global $db;
        $q = "SELECT * FROM `users` WHERE `user_email`=:email";
        $s = $db->prepare($q);
        $s->execute(['email'=>$email]);
        if($s->rowCount() > 0){
            return $s->fetch();
        }
        return false;
    }

    function getUserById($id) {
        global $db;
        $q = "SELECT * FROM `users` WHERE `user_ID`=:userid";
        $s = $db->prepare($q);
        $s->execute(['userid'=>$id]);
        if($s->rowCount() > 0){
            return $s->fetch();
        }
        return false;
    }

    function getUserDetailsById($id) {
        global $db;
        $q = "SELECT * FROM `users` u INNER JOIN `institutes` i ON u.institute_ID = i.institute_ID WHERE `user_ID`=:userid";
        $s = $db->prepare($q);
        $s->execute(['userid'=>$id]);
        if($s->rowCount() > 0){
            return $s->fetch();
        }
        return false;
    }

    function getAmbassadorDetailsByID($id)
    {
        global $db;
        $q = "SELECT * FROM `ambassadors` WHERE `ambassador_ID`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount()>0){
            return $s->fetch();
        }
        return false;
    }

    function isUserDisabled($email) {
        $user = getUserByEmail($email);
        if($user['user_status'] == 'D'){
            return true;
        }
        return false;
    }

    function isUserIdDisabled($id) {
        $user = getUserById($id);
        if($user['user_status'] == 'D'){
            return true;
        }
        return false;
    }
    function isUserIdExists($id) {
        $user = getUserById($id);
        if(!empty($user) && count($user) > 0){
            return true;
        }
        return false;
    }

    // Reset code generate
    function getResetCode($email)
    {
        global $db;

        $randomString = md5($email . time());

        $q = "INSERT INTO `reset_requests`(`reset_code`,`user_email`) VALUE (:reset_code, :user_email)";
        $s = $db->prepare($q);
        if($s->execute(['reset_code'=>$randomString, 'user_email'=>$email])){
            return $randomString;
        }
        return false;
    }

    // Get competitions [joins with category]
    function getCompetitions()
    {
        global $db;

        global $db;
        $q = "SELECT * FROM `competitions` co INNER JOIN `categories` ca ON co.category_ID = ca.category_ID WHERE `competition_deleted`='F'";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }


    // Get competition by id
    function getCompetitionById($comp_id)
    {
        global $db;
        $q = "SELECT * FROM `competitions` WHERE `competition_ID` = :compid";
        $s = $db->prepare($q);
        $s->execute(['compid'=>$comp_id]);
        return $s->fetch();
    }

    // Get coupon details
    function getPromoByName($promo)
    {
        global $db;
        $q = "SELECT * FROM `coupons` WHERE `coupon_name` = :coupid";
        $s = $db->prepare($q);
        $s->execute(['coupid'=>$promo]);
        return $s->fetch();
    }
    // Returns total number of times coupon is used.
    function numberTimeCouponUsed($coup_id)
    {
        global $db;
        $q = 'SELECT * FROM `coupon_used` WHERE `coupon_ID`=:id';
        $s = $db->prepare($q);
        $s->execute(['id'=>$coup_id]);
        return $s->rowCount();
    }

    // Returns false if user hasn't participated in given competition
    function isUserEligibleParticipation($user_id, $comp_id)
    {
        global $db;
        $q = "SELECT * FROM `participants` WHERE `competition_ID` = :compid AND `user_ID` = :userid";
        $s = $db->prepare($q);
        $s->execute(['compid'=>$comp_id, 'userid'=>$user_id]);
        
        if($s->rowCount() > 0){
            return false;
        }

        return true;
    }

    // Return false if limit is > than paid transaction in certain comp
    function isLimitExceeded($comp_id, $limit)
    {
        global $db;
        $q = "SELECT * FROM `participants` p INNER JOIN `transactions` t ON t.participant_ID = p.participant_ID
        WHERE p.competition_ID = :compid AND t.transaction_status = 'P'";
        $s = $db->prepare($q);
        $s->execute(['compid'=>$comp_id]);
        $participations = $s->fetchAll();

        $totalmembers = 0;

        foreach($participations as $participation){
            $totalmembers++;

            $q = "SELECT * FROM `members` WHERE `participant_ID`=:pid";
            $s = $db->prepare($q);
            $s->execute(['pid'=>$participation['participant_ID']]);
            $totalmembers = $totalmembers + $s->rowCount();
        }

        if($totalmembers < $limit) {
            return true;
        }

        return false;
    }

    // Get participation details 
    function getUserParticipation($user_id)
    {
        global $db;
        $q = "SELECT * FROM `participants` p 
            INNER JOIN `transactions` t ON p.participant_ID = t.participant_ID 
            INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID
            WHERE `user_ID` = :userid";
        $s = $db->prepare($q);
        $s->execute(['userid'=>$user_id]);

        return $s->fetchAll();
    }

    // Get fellow members of participant
    function getMembersOfParticipant($part_id)
    {
        global $db;
        $q = "SELECT * FROM `members` WHERE `participant_ID` = :partid";
        $s = $db->prepare($q);
        $s->execute(['partid'=>$part_id]);
        
        return $s->fetchAll();
    }

    // Remove ambassador ID of participant
    function setUserAmbassador($user_id, $value)
    {
        global $db;
        $q = "UPDATE `users` SET `ambassador_ID`=:ambassador WHERE `user_ID`=:userid";
        $s = $db->prepare($q);

        if($s->execute(['ambassador'=>$value, 'userid'=>$user_id])){
            return true;
        }
        return false;
    }

    // Get all ambassadors of institute 
    function getInstituteAmbassadors($ins_id)
    {
        global $db;
        $q = "SELECT * FROM `ambassadors` WHERE `institute_ID` = :insid";
        $s = $db->prepare($q);
        $s->execute(['insid'=>$ins_id]);
        
        return $s->fetchAll();
    }

    // Verify ambassador exists 
    function verifyAmbassador($am_id)
    {
        global $db;
        $q = "SELECT * FROM `ambassadors` WHERE `ambassador_ID` = :amid";
        $s = $db->prepare($q);
        $s->execute(['amid'=>$am_id]);
        
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }


    // Get all non deleted categories
    function getCategories()
    {
        global $db;
        $q = "SELECT * FROM `categories` WHERE `is_deleted`='N'";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }


    function getCompetitionsByCategoryId($cat_id)
    {
        global $db;
        $q = "SELECT * FROM `competitions` WHERE `category_ID` = :catid AND `competition_deleted`='F'";
        $s = $db->prepare($q);
        $s->execute(['catid'=>$cat_id]);
        return $s->fetchAll();
    }

    // Get competition with category/comp details
    function getCompetitionDetailsByCategoryId($comp_id)
    {
        global $db;
        $q = "SELECT * FROM `competitions` co INNER JOIN `categories` ca 
        ON co.category_ID = ca.category_ID
        LEFT JOIN `competition_details` cd ON co.competition_ID = cd.competition_ID WHERE co.competition_ID = :catid AND co.competition_deleted='F'";
        $s = $db->prepare($q);
        $s->execute(['catid'=>$comp_id]);
        return $s->fetch();
    }


?>