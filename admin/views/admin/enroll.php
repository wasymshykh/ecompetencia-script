<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Enroll Participants</li>
        </ul>
    </div>
</div>

<?php
/*

    User selects slot
    User gets list of participants unregistered

    

*/
?>

<section>
    <div class="container-fluid">

        <div class="row mt-4">

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 p-0">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Enroll New Participant</h4>
                            </div>
                            <div class="card-body">
                                <small><p>Make sure to select the slot first</p></small>
                                <?php if($success_room): ?>
                                    <div class="alert alert-success">
                                        <?=$success_room;?>
                                    </div>
                                <?php endif; ?>
                                <?php if($error_room): ?>
                                    <div class="alert alert-danger">
                                        <?=$error_room;?>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="room_name">Room Name</label>
                                                <input type="text" id="room_name" name="room_name" class="form-control" placeholder="E-501" value="<?=isset($room_name)?$room_name:''?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" name="add_room" class="btn btn-primary">Add Room</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h4>Rooms</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm dt-responsive display nowrap " id="dtb" cellspacing="0" width="100%">
                                        <thead>
                                            <th>Name</th>
                                            <th>Slots</th>
                                            <th class="no-sort"></th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($rooms as $room): ?>
                                            <tr>
                                                <td><?=$room['room_name']?></td>
                                                <td><?=count(getSlotsByRoom($room['room_ID']))?></td>
                                                <td>
                                                    <a href="rooms_slots.php?room=<?=$room['room_ID']?>" class="btn btn-primary btn-sm pt-1 pb-1"><i class="fas fa-edit"></i></a>
                                                    <a href="rooms_slots.php?remove_room=<?=$room['room_ID']?>" class="btn btn-danger btn-sm pt-1 pb-1"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <td></td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Add Slot</h4>
                    </div>
                    <div class="card-body">
                        <small><p>Make sure the room name is proper & unique</p></small>
                        <?php if($success_slot): ?>
                            <div class="alert alert-success">
                                <?=$success_slot;?>
                            </div>
                        <?php endif; ?>
                        <?php if($error_slot): ?>
                            <div class="alert alert-danger">
                                <?=$error_slot;?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slot_name">Slot Name</label>
                                        <input type="text" id="slot_name" name="slot_name" class="form-control" placeholder="Web Round 1 Slot 1" value="<?=isset($slot_name)?$slot_name:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slot_room">Select Room</label>
                                        <select name="slot_room" id="slot_room" class="form-control">
                                            <option value="">--select room--</option>
                                            <?php foreach($rooms as $room): ?>
                                                <option value="<?=$room['room_ID']?>" <?=(isset($slot_room) && $slot_room == $room['room_ID'])?'selected':''?>><?=$room['room_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slot_competition">Select Competition</label>
                                        <select name="slot_competition" id="slot_competition" class="form-control">
                                            <option value="">--select competition--</option>
                                            <?php foreach($competitions as $comp): ?>
                                                <option value="<?=$comp['competition_ID']?>" <?=(isset($slot_competition) && $slot_competition == $comp['competition_ID'])?'selected':''?>><?=$comp['competition_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="slot_limit">Limit</label>
                                        <input type="number" id="slot_limit" name="slot_limit" class="form-control" placeholder="12" value="<?=isset($slot_limit)?$slot_limit:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="slot_pre">Prior Round</label>
                                        <select name="slot_pre" id="slot_pre" class="form-control">
                                            <option value="">--select--</option>
                                            <?php foreach($slots as $slot): ?>
                                                <option value="<?=$slot['slot_ID']?>" <?=(isset($slot_pre) && $slot_pre == $slot['slot_ID'])?'selected':''?>><?=$slot['slot_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="slot_start">Competition Start</label>
                                        <div class="input-group">
                                            <input type="text" name="slot_start" class="form-control" id="slot_start" value="<?=isset($slot_start)?$slot_start:''?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id='datetimepicker1'>
                                        <label for="slot_end">Competition End</label>
                                        <div class="input-group">
                                            <input type="text" name="slot_end" class="form-control" id="slot_end" value="<?=isset($slot_end)?$slot_end:''?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="add_slot" class="btn btn-primary">Add Slot</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Slots</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm dt-responsive display nowrap" id="dtb2" cellspacing="0" width="100%">
                                <thead>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Competition</th>
                                    <th>Participants</th>
                                    <th>Limit</th>
                                    <th>Prior Round</th>
                                    <th>Start</th>
                                    <th>Finish</th>
                                    <th class="no-sort"></th>
                                </thead>
                                <tbody>
                                    <?php foreach($slots as $slot): ?>
                                    <tr>
                                        <td><?=$slot['slot_name']?></td>
                                        <td><?=$slot['room_name']?></td>
                                        <td><?=$slot['competition_name']?></td>
                                        <td><?="<i>todo</i>"?></td>
                                        <td><?=$slot['slot_limit']?></td>
                                        <td><?=!empty($slot['slot_pre'])?getSlotById($slot['slot_pre'])['slot_name']:'<i>non</i>'?></td>
                                        <td><?=normalTime($slot['slot_start'])?></td>
                                        <td><?=normalTime($slot['slot_end'])?></td>
                                        <td>
                                            <a href="rooms_slots.php?room=<?=$slot['slot_ID']?>" class="btn btn-primary btn-sm pt-1 pb-1"><i class="fas fa-edit"></i></a>
                                            <a href="rooms_slots.php?remove_room=<?=$room['slot_ID']?>" class="btn btn-danger btn-sm pt-1 pb-1"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <td></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
