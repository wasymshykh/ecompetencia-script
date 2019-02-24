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

    function isUserDisabled($email) {
        $user = getUserByEmail($email);
        if($user['user_status'] == 'D'){
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


?>