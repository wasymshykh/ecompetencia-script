<?php

    // normalize inputs
    function normal($data) {
        if(gettype($data) !== "array"){
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
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

    // returns true if team email exists
    function teamEmailExists($email) {
        global $db;
        $q = "SELECT `email` FROM `member_applicant` WHERE `email`=:email";
        $s = $db->prepare($q);
        $s->execute(['email'=>$email]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }

    function ambassadorEmailExists($email)
    {
        global $db;
        $q = "SELECT `ambassador_email` FROM `ambassador_applicant` WHERE `ambassador_email`=:email";
        $s = $db->prepare($q);
        $s->execute(['email'=>$email]);
        if($s->rowCount() > 0){
            return true;
        }
        return false;
    }

    function getInstitutes() {
        global $db;
        $q = "SELECT * FROM `institutes` WHERE `institute_status`='E' ORDER BY `institute_name` ASC";
        $s = $db->prepare($q);
        $s->execute();
        return $s->fetchAll();
    }

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


?>