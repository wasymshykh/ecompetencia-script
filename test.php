<?php

include 'config/db.php';

$universities = [
    "DHA Suffa University DSU",
    "Usman Institute of Technology UIT",
    "Isra University",
    "Aligarh Institute of Technology AIT",
    "Adamjee Government Science College",
    "Barrett Hodgson University",
    "Institute of Industrial Electronics Engineering IIEE",
    "Bahauddin Zakariya University BZU",
    "Greenwich University GU",
    "University of Karachi UoK UBIT KU",
    "Asian Institute of Fashion Design AIFD",
    "National University of Computer and Emerging Sciences, FAST-NUCES",
    "National University of Sciences and Technology NUST",
    "Mehran University of Engineering & Technology",
    "Sindh Madressatul Islam University",
    "Hamdard University",
    "NED University of Engineering and Technology",
    "Dawood University of Engineering and Technology",
    "Iqra University IU",
    "ILMA University",
    "Sir Syed University of Engineering and Technology SSUET",
    "Karachi Institute of Economics and Technology PAF KIET",
    "Shaheed Zulfiqar Ali Bhutto Institute of Science and Technology SZABIST",
    "Aga Khan University",
    "Dow University of Health Sciences",
    "Ziauddin University",
    "Baqai Medical University",
    "Karachi Medical and Dental College",
    "Benazir Bhutto Shaheed University",
    "Institute of Business Administration IBA",
    "Tabani's School of Accountancy TSA",
    "Karachi School of Arts KSA",
    "Karachi School of Business and Leadership KSBL",
    "Institute of Business Management IoBM (CBM)",
    "Virtual University VU",
    "Nazeer Hussain University NHU",
    "Adamson Institute of Business Administration and Technology",
    "Bahria University BU",
    "D.J. Sindh Government Science College",
    "Federal Urdu University",
    "Preston Institute of Management Science and Technology PIMSAT",
    "Dadabhoy Institute of Higher Education DIHE",
    "Indus University",
    "Indus Valley School of Art and Architecture",
    "Jinnah University for Women JUW",
    "Khadim Ali Shah Bukhari Institute of Technology KASBIT",
    "Mohammad Ali Jinnah University MAJU",
    "Newports Institute of Communications & Economics",
    "Preston University",
    "Textile Institute of Pakistan",
    "Habib University HU",
    "Karachi Institute of Technology and Entrepreneurship KITE",
    "Beconhouse School",
    "The City School",
    "The Educators",
    "The Academy School",
    "NCR-CET College",
    "BAMM PECHS Government College For Women",
    "Aptech Computer Education",
    "Defence College For Women DCW"
];

sort($universities);
echo '<pre>';
print_r($universities);
echo '</pre>';

// foreach ($universities as $uni) {
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//     $s1 = $db->prepare("SELECT * FROM `institutes` WHERE `institute_name`=\"$uni\"");
//     $s1->execute();
//     $ex = $s1->rowCount();

//     if(!($ex > 0)){
//         $q = "INSERT INTO `institutes`(`institute_name`) VALUE(\"".$uni."\")";
//         $s= $db->prepare($q);
//         echo "->". $q;
//         $s->execute();
//     }
// }



?>