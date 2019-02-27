<?php

    // normalize inputs
    function normal($data) {
        if(gettype($data) !== "array"){
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }
        return '';
    }

    function fileNameCheck($filename) {
        return ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
    }


    // Returns true if passed id is admin
    function isAdmin($id) {
        global $db;
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id AND `management_type`='A'";
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
        $q = "SELECT * FROM `management` WHERE `management_ID`=:id";
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


?>