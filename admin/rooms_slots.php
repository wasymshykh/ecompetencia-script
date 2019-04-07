<?php

    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';
  
    $showRoomEdit = false;
    $success_room = false;
    $error_room = false;
    $success_slot = false;
    $error_slot = false;


    if(isset($_POST['add_slot'])) {

        $slot_name = isset($_POST['slot_name'])?normal($_POST['slot_name']):'';
        $slot_room = isset($_POST['slot_room'])?normal($_POST['slot_room']):'';
        $slot_competition = isset($_POST['slot_competition'])?normal($_POST['slot_competition']):'';
        $slot_limit = isset($_POST['slot_limit'])?normal($_POST['slot_limit']):'';
        $slot_pre = isset($_POST['slot_pre'])?normal($_POST['slot_pre']):NULL;
        $slot_start = isset($_POST['slot_start'])?normal($_POST['slot_start']):'';
        $slot_end = isset($_POST['slot_end'])?normal($_POST['slot_end']):'';

        if(empty($slot_name)) {
            $error_slot = "Slot name can't be empty!";
        }
        if(!$error_slot && empty($slot_room)) {
            $error_slot = "Room can't be empty!";
        }
        if(!$error_slot && empty($slot_competition)) {
            $error_slot = "Competition can't be empty!";
        }
        if(!$error_slot && empty($slot_limit)) {
            $error_slot = "Slot limit can't be empty!";
        }
        if(!$error_slot && empty($slot_start)) {
            $error_slot = "Select start time properly!";
        }
        if(!$error_slot && empty($slot_end)) {
            $error_slot = "Select end time properly!";
        }

        if(!$error_slot && !empty(getSlotByName($slot_name))) {
            $error_slot = "Slot name already exists";
        }
        if(!$error_slot && $slot_limit < 1) {
            $error_slot = "Limit can't be less than 1";
        }

        if(!$error_slot) {

            $dateDifference = dateDifference($slot_start, $slot_end);

            if($dateDifference['notice'] == -1) {
                $error_slot = "Invalid start to finish selected!";
            }

            // matching conflicts in same room with same timing
            $same_room_slots = getSlotsByRoom($slot_room);
            if(!empty($same_room_slots)) {
                
                foreach ($same_room_slots as $s_r_slot) {

                    if(inTimeRange($s_r_slot['slot_start'], $s_r_slot['slot_end'], $slot_start) || inTimeRange($s_r_slot['slot_start'], $s_r_slot['slot_end'], $slot_end)) {
                        $error_slot = "Conflict in already existing slot of this room.";
                        break;
                    }
                    
                }
            }

           if(!$error_slot) {

                $slot_start_f = (new DateTime($slot_start))->format('Y-m-d H:i:s');
                $slot_end_f = (new DateTime($slot_end))->format('Y-m-d H:i:s');

                $query = "INSERT INTO `slots`(`slot_name`, `room_ID`, `competition_ID`, `slot_limit`, `slot_pre`, `slot_start`, `slot_end`) VALUE (:name, :r_id, :c_id, :limit, ".(!empty($slot_pre)?"'".$slot_pre."'":"NULL").", :start, :end)";
    
                $stmt = $db->prepare($query);

                if($stmt->execute(['name'=>$slot_name, 'r_id'=>$slot_room, 'c_id'=>$slot_competition, 'limit'=>$slot_limit, 'start'=>$slot_start_f, 'end'=>$slot_end_f])) {
                    $success_slot = "Successfully added slot in the room.";
                } else {
                    $error_slot = "Unable to add slot.";
                }

            }


            // no errors! insert value into db

            
        }

    }
    

    if(isset($_POST['add_room'])){
        $room_name = normal($_POST['room_name']);
        if(empty($room_name)) {
            $error_room = "Please enter room name";
        }
        if(!$error_room && !empty(getRoomByName($room_name))) {
            $error_room = "Room already exists";
        }
        if(empty($error_room)) {
            $query = "INSERT INTO `rooms`(`room_name`) VALUE (:room_name)";
            $stmt = $db->prepare($query);
            if($stmt->execute(['room_name'=>$room_name])){
                $success_room = "Room added!";
            } else {
                $error_room = "Can't insert!";
            }
        }
    }

    if(isset($_GET['room']) && is_numeric($_GET['room'])){

        $edit_room = getRoomById(normal($_GET['room']));

        if(!empty($edit_room)) {
            $showRoomEdit = true;
            $success_room_e = false;
            $error_room_e = false;

            if(isset($_POST['edit_r'])) {

                $room_name = normal($_POST['e_room_name']);
                if(empty($room_name)) {
                    $error_room_e = "Please enter room name";
                }
                if(!$error_room_e && !empty(getRoomByName($room_name))) {
                    if($room_name != $edit_room['room_name']) {
                        $error_room_e = "Room already exists";
                    }
                }

                if(!$error_room_e) {
                    $query = "UPDATE `rooms` SET `room_name`=:room_name WHERE `room_ID`=:room_id";
                    $stmt = $db->prepare($query);
                    if($stmt->execute(['room_name'=>$room_name, 'room_id'=>$edit_room['room_ID']])){
                        $success_room_e = "Room updated successfully!";
                    } else {
                        $error_room_e = "Can't update the room!";
                    }
                }
                
            }


        } else {
            header('location: rooms_slots.php');
        }

    }


?>
<?php 
  $page_title = "Rooms & Slots";
  include 'views/admin/layout/header.php'; 
?>
<?php

    // competitions
    $competitions = getCompetitions();

    // rooms
    $rooms = getRooms();

    // slots
    $slots = getSlotsDetails();


    include 'views/admin/rooms_slots.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>