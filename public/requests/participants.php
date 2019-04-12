<?php
    include '../../config/db.php';
    include '../includes/functions.php';
    header('Content-Type: application/json');

    // Handling here
    if(isset($_GET['comp'])){
        $competition = getCompetitionById(normal($_GET['comp']));
        if($competition && count($competition) > 0 && $competition['competition_status'] == 'E'){

            $data = ajaxConfirmedParticipants($competition['competition_ID']);


            if(!empty($data)){
                $toSend = [
                    'success'=> true,
                    'data'=> $data
                ];
                echo json_encode($toSend);
            } else {
                echo json_encode(['error'=>'Couldn\'t find any confirmed']);
            }
        } else {
            echo json_encode(['error'=>'Invalid competition code']);
        }
    } else {
        echo json_encode(['error'=>'Invalid request sent']);
    }
?>