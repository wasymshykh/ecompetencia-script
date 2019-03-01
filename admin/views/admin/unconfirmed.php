<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Unconfirmed Participants</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="h3 display">Participants</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <?php if($showConfirm): ?>
            <div class="col-lg-8 offset-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Confirmation</h4>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($user_error)):?>
                        <div class="alert alert-danger">
                            <?=$user_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($user_success)):?>
                        <div class="alert alert-success">
                            <?=$user_success;?>
                        </div>
                        <?php else: ?>
                        <form action="" method="POST">
                            <div class="row statistics">
                                <div class="col-lg-12">
                                    <div class="income text-center">
                                        <div class="icon"><i class="icon-bill"></i></div>
                                        <div class="number"><?=$part['transaction_total']?> PKR</div><strong class="text-primary">Collect It</strong>
                                        <p>You must collect that cash from participant before proceeding.</p>
                                    </div>
                                </div>
                            </div
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <input type="submit" value="Yes, I've Recieved" name="confirm_participant" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/unconfirmed.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Unconfirmed Participants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Registered On</th>
                                        <th>Due</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                    <tr>
                                        <td><?=$participant['user_fname'].' '.$participant['user_lname']?></td>
                                        <td><?=$participant['participant_team']?><span class="badge badge-info"><?=count(getMembersOfParticipant($participant['participant_ID']))?> Members</span></td>
                                        <td><?=$participant['competition_name']?></td>
                                        <td><?=$participant['participant_time']?></td>
                                        <td><?=$participant['transaction_total'].' PKR'?></td>
                                        <td style="text-align:center">
                                            <a href="<?=ADMIN_URL?>/unconfirmed.php?confirm=<?=$participant['participant_ID']?>" class="btn btn-primary btn-sm m-1">
                                                <i class="fas fa-check mr-2"></i> Confirm
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    
    </div>
</section>