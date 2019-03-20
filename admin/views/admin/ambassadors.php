<section class="section-padding">
    <div class="container">
        <div class="row justify-content-md-center">
            <?php if($showConfirm): ?>
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Ambassador</h4>
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
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row statistics">
                                <div class="col-lg-6 text-center">
                                    <p>Name</p>
                                    <h5><?=$applicant['ambassador_fname'].' '.$applicant['ambassador_lname']?></h5>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <p>Institute</p>
                                    <h5><?=getInstituteById($applicant['institute_ID'])['institute_name']?></h5>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="password">Create New Password</label>
                                            <input type="text" name="password" id="password" value="<?=isset($_POST['password'])?$_POST['password']:''?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="show">Public Visibility <span class="badge badge-sm badge-dark">Currenlty: <b><?=($applicant['ambassador_show'] == 'P')?'Phone':'Email'?></b></span></label>
                                            <select name="show" id="show" class="form-control">
                                                <option value="P" <?=($applicant['ambassador_show'] == 'P')?'selected':''?>>Phone</option>
                                                <option value="E" <?=($applicant['ambassador_show'] == 'E')?'selected':''?>>Email</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="status">Status <span class="badge badge-sm badge-dark">Currenlty: <b><?=($applicant['ambassador_status'] == 'E')?'Enable':'Disable'?></b></span></label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="E" <?=($applicant['ambassador_status'] == 'E')?'selected':''?>>Enable</option>
                                                <option value="D" <?=($applicant['ambassador_status'] == 'D')?'selected':''?>>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <input type="submit" value="Update Ambassador" name="update_am" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/ambassadors.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recieved Applications</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm display nowrap" id="dtb">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Phone</th>
                                        <th>Institute</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($applicants as $applicant): ?>
                                    <tr>
                                        <td><?=$applicant['ambassador_ID']?></td>
                                        <td><div style="width: 30px;height: 30px;overflow:hidden;border-radius:50%;">
                                            <img src="<?=URL?>/assets/img/ambassador/<?=$applicant['ambassador_avatar']?>" style="width: 100%;height:auto;display:block">
                                            </div>
                                        </td>
                                        <td><?=$applicant['ambassador_fname']?> <?=$applicant['ambassador_lname']?></td>
                                        <td><?=$applicant['ambassador_email']?></td>
                                        <td>
                                            <a href="?view=<?=$applicant['ambassador_ID']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <?php if($applicant['ambassador_status'] == 'E'): ?>
                                                <a href="?toggle=<?=$applicant['ambassador_ID']?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                            <?php else: ?>
                                                <a href="?toggle=<?=$applicant['ambassador_ID']?>" class="btn btn-secondary btn-sm"><i class="fa fa-check"></i></a>
                                            <?php endif; ?>
                                            <a href="?update=<?=$applicant['ambassador_ID']?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td><?=$applicant['ambassador_phoneno']?></td>
                                        <td><?=getInstituteById($applicant['institute_ID'])['institute_name']?></td>
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

<script>
$(document).ready(function() {
    $('#dtb').DataTable({
        "scrollX": true
    });
});
</script>