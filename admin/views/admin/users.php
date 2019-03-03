<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Manage Users</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="h3 display">Users</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <?php if($showEdit): ?>
            <div class="col-lg-8 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_fname">First Name</label>
                                        <input type="text" name="e_fname" id="e_fname" class="form-control" placeholder="e.g. Muhammad" value="<?=isset($e_fname)?$e_fname:$user_details['user_fname']?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_lname">Last Name</label>
                                        <input type="text" name="e_lname" id="e_lname" class="form-control" placeholder="e.g. Ahmed" value="<?=isset($e_lname)?$e_lname:$user_details['user_lname']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email_id">Email Address</label>
                                        <input type="email" name="e_email" id="email_id" class="form-control" value="<?=isset($e_email)?$e_email:$user_details['user_email']?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone_no">Phone</label>
                                        <input type="text" name="e_phone" id="phone_no" class="form-control" value="<?=isset($e_phone)?$e_phone:$user_details['user_phone']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_institute">Institute</label>
                                        <select name="e_institute" id="e_institute" class="form-control">
                                            <?php foreach($institutes as $institute): ?>
                                                <option value="<?=$institute['institute_ID']?>" <?=($user_details['institute_ID'] == $institute['institute_ID'])?'selected':''?>><?=$institute['institute_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_ambassador">Ambassador</label>
                                        <select name="e_ambassador" id="e_ambassador" class="form-control">
                                            <option value="NULL">None</option>
                                            <?php foreach($ambassadors as $ambassador): ?>
                                                <option value="<?=$ambassador['ambassador_ID']?>" <?=($user_details['ambassador_ID'] == $ambassador['ambassador_ID'])?'selected':''?>><?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname'].' ['.$ambassador['institute_name'].']'?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_user" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/users.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Password</h4>
                    </div>
                    <div class="card-body">
                    <?php if(!empty($edit_error)):?>
                        <div class="alert alert-danger">
                            <?=$edit_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($edit_success)):?>
                        <div class="alert alert-success">
                            <?=$edit_success;?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="e_password">New Password</label>
                                <input type="password" name="e_password" id="e_password" class="form-control" placeholder="*******" value="">
                            </div>
                            <div class="form-group">
                                <label for="e_password_c">New Password Confirm</label>
                                <input type="password" name="e_password_c" id="e_password_c" class="form-control" placeholder="*******" value="">
                            </div>
                            <hr>
                            <div class="form-group mt-4">
                                <input type="submit" value="Update" name="edit_password" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Institute</th>
                                        <th>Ambassador</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user): ?>
                                    <tr>
                                        <td><?=$user['user_fname'].' '.$user['user_lname']?></td>
                                        <td><?=$user['user_email']?></td>
                                        <td><?=$user['user_phone']?></td>
                                        <td><?=$user['institute_name']?></td>
                                        <td><?=$user['ambassador_fname'].' '.$user['ambassador_lname']?></td>
                                        <td style="text-align:center">
                                            <a href="<?=ADMIN_URL?>/users.php?edit=<?=$user['user_ID']?>" class="btn btn-primary btn-sm m-1">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                            </a>
                                            <?php if($_SESSION['management']['management_type'] === 'A'):?>
                                            <?php if($user['user_status'] == 'D'): ?>
                                            <a href="<?=ADMIN_URL?>/users.php?toggle=<?=$user['user_ID']?>" class="btn btn-success btn-sm m-1">
                                                <i class="fas fa-check-double mr-2"></i> Unban
                                            </a>
                                            <?php else: ?>
                                            <a href="<?=ADMIN_URL?>/users.php?toggle=<?=$user['user_ID']?>" class="btn btn-danger btn-sm m-1">
                                                <i class="fas fa-ban mr-2"></i> Ban
                                            </a>
                                            <?php endif; ?>
                                            <?php endif;?>
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