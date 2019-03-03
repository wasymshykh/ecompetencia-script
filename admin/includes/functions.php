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

    function fileNameCheck($filename) {
        return ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
    }


    // Returns true if passed id is admin
    function isAdmin($id) {
        global $db;
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id AND (`management_type`='A' OR `management_type`='R')";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount() === 1){
            return true;
        }
        return false;
    }

    // Returns true if user exists
    function isUser($id) {
        global $db;
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id AND `management_status`='E'";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount() === 1){
            return true;
        }
        return false;
    }


    // Returns true if user is using password
    function isValidLogin($id, $pass) {
        global $db;
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id AND `management_password`=:password";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id, 'password'=>$pass]);
        if($s->rowCount() === 1){
            return true;
        }
        return false;
    }

    // Get administrator details 
    function adminDetails($id) {
        global $db;
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id AND `management_type`='A'";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        return $s->fetch();
    }

    // Get team member applicants
    function getTeamApplicants($sortBy = 'id', $sortType = 'asc')
    {
        global $db;
        $q = "SELECT * FROM `member_applicant` ORDER BY $sortBy $sortType";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get a team member applicant
    function getTeamApplicant($id)
    {
        global $db;
        $q = "SELECT * FROM `member_applicant` WHERE `id`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        return $s->fetch();
    }

    // Get a team member applicant
    function isTeamApplicant($id)
    {
        global $db;
        $q = "SELECT * FROM `member_applicant` WHERE `id`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount() === 1){
            return true;
        }
        return false;
    }

    // Get skills in form of badges
    function getSkillBadges($mix)
    {
        $skills = explode(',', $mix);
        $html = "";
        foreach ($skills as $skill) {
            $html .= "<div class=\"badge badge-dark\" style=\"margin-right: 0.5em\">$skill</div>";
        }
        
        return $html;
    }

    
    // Get all ambassador applicants
    function getAmbassadorApplicants($sortBy = 'ambassador_ID', $sortType = 'asc')
    {
        global $db;
        $q = "SELECT * FROM `ambassador_applicant` ORDER BY $sortBy $sortType";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get a ambassador applicant
    function getAmbassadorApplicant($id)
    {
        global $db;
        $q = "SELECT * FROM `ambassador_applicant` WHERE `ambassador_ID`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        return $s->fetch();
    }

    // Is ambassador applicant exists
    function isAmbassadorApplicant($id)
    {
        global $db;
        $q = "SELECT * FROM `ambassador_applicant` WHERE `ambassador_ID`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        if($s->rowCount() === 1){
            return true;
        }
        return false;
    }

    // Get all institutes details
    function getInstitutes()
    {
        global $db;
        $q = "SELECT * FROM `institutes`";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get institute details by it's id
    function getInstituteById($id)
    {
        global $db;
        $q = "SELECT * FROM `institutes` WHERE `institute_ID`=:id";
        $s = $db->prepare($q);
        $s->execute(['id'=>$id]);
        return $s->fetch();
    }

    // Get settings value
    function getSettings($name)
    {
        global $db;
        $q = "SELECT `setting_value` FROM `site_settings` WHERE `setting_name`=:name";
        $s = $db->prepare($q);
        $s->execute(['name'=>$name]);
        if($s->rowCount() > 0){
            return $s->fetch()['setting_value'];
        }
        return false;
    }

    // Set settings value
    function setSettings($name, $value)
    {
        global $db;
        $q = "UPDATE `site_settings` SET `setting_value`=:value WHERE `setting_name`=:name";
        $s = $db->prepare($q);
        $r = $s->execute(['value'=>$value, 'name'=>$name]);
        
        return $r;
    }

    // Get all competition categories
    function getCategories()
    {
        global $db;
        $q = "SELECT * FROM `categories`";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get category by category id
    function getCategoryById($cat_id)
    {
        global $db;
        $q = "SELECT * FROM `categories` WHERE `category_ID` = :catid";
        $s = $db->prepare($q);
        $s->execute(['catid'=>$cat_id]);
        return $s->fetch();
    }

    function updateCategoryName($name, $cat_id)
    {
        global $db;
        $q = "UPDATE `categories` SET `category_name`=:name WHERE `category_ID` = :catid";
        $s = $db->prepare($q);
        if($s->execute(['name'=>$name, 'catid'=>$cat_id])){
            return true;
        }
        return false;
    }

    function updateCategoryImage($name, $cat_id)
    {
        global $db;
        $q = "UPDATE `categories` SET `category_img`=:name WHERE `category_ID` = :catid";
        $s = $db->prepare($q);
        if($s->execute(['name'=>$name, 'catid'=>$cat_id])){
            return true;
        }
        return false;
    }

    function updateCategoryDelete($cat_id)
    {
        global $db;
        $q = "UPDATE `categories` SET `is_deleted`='Y' WHERE `category_ID` = :catid";
        $s = $db->prepare($q);
        if($s->execute(['catid'=>$cat_id])){
            return true;
        }
        return false;
    }

    function getCompetitionsByCategoryId($cat_id)
    {
        global $db;
        $q = "SELECT * FROM `competitions` WHERE `category_ID` = :catid";
        $s = $db->prepare($q);
        $s->execute(['catid'=>$cat_id]);
        return $s->fetchAll();
    }

    // Get all competitions
    function getCompetitions()
    {
        global $db;
        $q = "SELECT * FROM `competitions` WHERE `competition_deleted`='F'";
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

    function getCompetitionDetailsById($comp_id)
    {
        global $db;
        $q = "SELECT * FROM `competitions` co INNER JOIN `categories` ca 
        ON co.category_ID = ca.category_ID
        LEFT JOIN `competition_details` cd ON co.competition_ID = cd.competition_ID WHERE co.competition_ID = :compid AND co.competition_deleted='F'";
        $s = $db->prepare($q);
        $s->execute(['compid'=>$comp_id]);
        return $s->fetch();
    }

    function updateCompetitionStatus($comp_id, $status)
    {
        global $db;
        $q = "UPDATE `competitions` SET `competition_status`=:status WHERE `competition_ID` = :compid";
        $s = $db->prepare($q);
        if($s->execute(['status'=>$status, 'compid'=>$comp_id])){
            return true;
        }
        return false;
    }


    function updateCompetitionDeleted($comp_id, $status)
    {
        global $db;
        $q = "UPDATE `competitions` SET `competition_deleted`=:status WHERE `competition_ID` = :compid";
        $s = $db->prepare($q);
        if($s->execute(['status'=>$status, 'compid'=>$comp_id])){
            return true;
        }
        return false;
    }

    function getAllLogs()
    {
        global $db;
        $q = "SELECT * FROM `loggers`";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get all coupons from db with details
    function getCoupons() {
        global $db;
        $q = 'SELECT * FROM `coupons`';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }
    // Get a coupon with it's id
    function getCoupon($coup_id) {
        global $db;
        $q = 'SELECT * FROM `coupons` WHERE `coupon_ID`=:id';
        $s = $db->prepare($q);
        $s->execute(['id'=>$coup_id]);
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

    // Get all users details with ambassador/institute details
    function getUsersDetails()
    {
        global $db;
        $q = 'SELECT * FROM `users` u INNER JOIN `institutes` i ON u.institute_ID = i.institute_ID LEFT JOIN `ambassador_applicant` a ON u.ambassador_ID = a.ambassador_ID';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    // Get specific user details by id
    function getUserDetailsById($user_id)
    {
        global $db;
        $q = 'SELECT * FROM `users` u INNER JOIN `institutes` i ON u.institute_ID = i.institute_ID LEFT JOIN `ambassador_applicant` a ON u.ambassador_ID = a.ambassador_ID WHERE `user_ID`=:userid';
        $s = $db->prepare($q);
        $s->execute(['userid'=>$user_id]);
        return $s->fetch();
    }

    // Get specific management details by id
    function getManagementDetailsById($user_id)
    {
        global $db;
        $q = 'SELECT * FROM `management` WHERE `management_ID`=:userid';
        $s = $db->prepare($q);
        $s->execute(['userid'=>$user_id]);
        return $s->fetch();
    }

    function getAmbassadors()
    {
        global $db;
        $q = 'SELECT * FROM `ambassador_applicant`';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    function getAmbassadorsDetails()
    {
        global $db;
        $q = 'SELECT * FROM `ambassador_applicant` a INNER JOIN `institutes` i ON a.institute_ID = i.institute_ID';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
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

    function getParticipantsDetails()
    {
        global $db;
        $q = 'SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `transactions` t ON p.participant_ID = t.participant_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    function getUnconfirmedParticipantsDetails()
    {
        global $db;
        $q = "SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `transactions` t ON p.participant_ID = t.participant_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID WHERE t.transaction_status='U'";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

    function getPartDetailsById($part_id)
    {
        global $db;
        $q = 'SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `transactions` t ON p.participant_ID = t.participant_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID WHERE p.participant_ID=:partid';
        $s = $db->prepare($q);
        $s->execute(['partid'=>$part_id]);
        return $s->fetch();
    }

    function getUnconfirmedPartDetailsById($part_id)
    {
        global $db;
        $q = "SELECT * FROM `participants` p INNER JOIN `users` u ON p.user_ID = u.user_ID INNER JOIN `transactions` t ON p.participant_ID = t.participant_ID INNER JOIN `competitions` c ON p.competition_ID = c.competition_ID WHERE t.transaction_status='U' AND p.participant_ID=:partid";
        $s = $db->prepare($q);
        $s->execute(['partid'=>$part_id]);
        return $s->fetch();
    }

    function getMembersOfParticipant($part_id)
    {
        global $db;
        $q = "SELECT * FROM `members` WHERE `participant_ID` = :partid";
        $s = $db->prepare($q);
        $s->execute(['partid'=>$part_id]);
        
        return $s->fetchAll();
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


    function getAllManagement()
    {
        global $db;
        $q = 'SELECT * FROM `management`';
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }



?>