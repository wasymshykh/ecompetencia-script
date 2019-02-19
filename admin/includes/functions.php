<?php

    // normalize inputs
    function normal($data) {
        if(gettype($data) !== "array"){
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }
        return '';
    }


    // Returns true if passed id is admin
    function isAdmin($id) {
        global $db;
        $q = "SELECT * FROM `users` WHERE `user_ID`=:id AND `user_type`='A'";
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
        $q = "SELECT * FROM `users` WHERE `user_ID`=:id";
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
        $q = "SELECT * FROM `users` WHERE `user_ID`=:id AND `user_password`=:password";
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
        $q = "SELECT * FROM `users` WHERE `user_ID`=:id AND `user_type`='A'";
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
    function isApplicant($id)
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


?>