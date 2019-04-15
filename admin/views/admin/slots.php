<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Slots List</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
        <div class="row mt-4">

            <?php foreach($slots as $slot): ?>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <a href="enroll.php?slot=<?=$slot['slot_ID']?>" class="card">
                    <div class="card-header text-center">
                        <p class="badge badge-primary text-white m-0">Slot</p>
                        <h4><?=$slot['slot_name']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="m-0">Room</p>
                                <h3><?=$slot['room_name']?></h3>
                                <span class="badge badge-secondary badge-sm block"><?=$slot['competition_name']?></span>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-0">Start Time</p>
                                        <h6 style="text-transform: uppercase"><?=roomTime($slot['slot_start'])?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-0">End Time</p>
                                        <h6 style="text-transform: uppercase"><?=roomTime($slot['slot_end'])?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-0">Slot limit</p>
                                        <h6><?=$slot['slot_limit']?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                    15                        <p class="m-0">Slot Used</p>
                                        <h6><?=count(getParticipantsInSlot($slot['slot_ID']))?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
