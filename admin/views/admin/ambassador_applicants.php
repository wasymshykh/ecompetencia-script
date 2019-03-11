<section class="section-padding">
    <div class="container">
        <div class="row justify-content-md-center">
            <?php if($showConfirm): ?>
            <div class="col-lg-8 offset-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Creating Ambassador</h4>
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
                                <div class="col-lg-6 text-center">
                                    <p>Name</p>
                                    <h5><?=$applicant['fname'].' '.$applicant['lname']?></h5>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <p>Institute</p>
                                    <h5><?=getInstituteById($applicant['institute_ID'])['institute_name']?></h5>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="password">Create Password</label>
                                            <input type="text" name="password" id="password" value="<?=isset($_POST['password'])?$_POST['password']:''?>" class="form-control">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="show">Public Visibility</label>
                                            <select name="show" id="show" class="form-control">
                                                <option value="P">Phone</option>
                                                <option value="E">Email</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <input type="submit" value="Create Ambassador" name="confirm_ambassador" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/ambassador_applicants.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                        <?php endif; ?>
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
                                        <th>Institute</th>
                                        <th>Phone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($applicants as $applicant): ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><div style="width: 30px;height: 30px;overflow:hidden;border-radius:50%;">
                                            <img src="<?=URL?>/inductions/applicants/ambassador/<?=$applicant['avatar']?>" style="width: 100%;height:auto;display:block">
                                            </div>
                                        </td>
                                        <td><?=$applicant['fname']?> <?=$applicant['lname']?></td>
                                        <td><?=$applicant['email']?></td>
                                        <td><?=getInstituteById($applicant['institute_ID'])['institute_name']?></td>
                                        <td><?=$applicant['phoneno']?></td>
                                        <td>
                                            <a href="?view=<?=$applicant['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                            <?php if($applicant['status'] == 'S'): ?>
                                            <a href="?confirm=<?=$applicant['id']?>" class="btn btn-secondary btn-sm"><i class="fa fa-check"></i></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
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