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
                <div class="col-lg-8">
                    <h1 class="h3 display">Management Users</h1>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUser">Add Management</button>
                </div>
            </div>
        </header>

        <div id="addUser" tabindex="-1" role="dialog" aria-labelledby="catModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="catModalLabel" class="modal-title">Add Competition</h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <?php if(!empty($error)):?>
                        <div class="alert alert-danger">
                            <?=$error;?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="f_name">First Name</label>
                                        <input type="text" name="f_name" id="f_name" class="form-control" placeholder="First Name" value="<?=isset($_POST['f_name'])?$_POST['f_name']:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="l_name">Last Name</label>
                                        <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Last Name" value="<?=isset($_POST['l_name'])?$_POST['l_name']:''?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=isset($_POST['email'])?$_POST['email']:''?>">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?=isset($_POST['phone'])?$_POST['phone']:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="R">Registration</option>
                                            <option value="A">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_c">Password Confirm</label>
                                        <input type="password" name="password_c" id="password_c" class="form-control" placeholder="Password Confirm" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">       
                                <button class="btn btn-primary btn-block mx-auto" type="submit" name="add_user">Add Management</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php if($showNewModal): ?>
            <script>
                $('#addUser').modal('show');
            </script>
        <?php endif;?>


<div class="row">
        <?php if($showEdit): ?>
        <div class="col-lg-8 mb-5">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Management</h4>
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
                                    <input type="text" name="e_fname" id="e_fname" class="form-control" placeholder="e.g. Muhammad" value="<?=isset($e_fname)?$e_fname:$m_details['management_fname']?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="e_lname">Last Name</label>
                                    <input type="text" name="e_lname" id="e_lname" class="form-control" placeholder="e.g. Ahmed" value="<?=isset($e_lname)?$e_lname:$m_details['management_lname']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email_id">Email Address</label>
                                    <input type="email" name="e_email" id="email_id" class="form-control" value="<?=isset($e_email)?$e_email:$m_details['management_email']?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_no">Phone</label>
                                    <input type="text" name="e_phone" id="phone_no" class="form-control" value="<?=isset($e_phone)?$e_phone:$m_details['management_mobile']?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mt-4">
                            <input type="submit" value="Save" name="edit_user" class="btn btn-primary">
                            <a href="<?=ADMIN_URL?>/management.php" class="btn btn-default">Cancel</a>
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
</div>

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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($managements as $management): ?>
                                <tr>
                                    <td><?=$management['management_ID']?></td>
                                    <td><?=$management['management_fname'].' '.$management['management_lname']?></td>
                                    <td><?=$management['management_email']?></td>
                                    <td><?=$management['management_mobile']?></td>

                                    <td><?php if($management['management_type']=='A'):?>
                                        <span class="badge badge-primary">Administrator</span>
                                        <?php elseif($management['management_type']=='R'): ?>
                                        <span class="badge badge-secondary">Registration</span>
                                        <?php endif;?></td>

                                    <td style="text-align:center">
                                        <a href="<?=ADMIN_URL?>/management.php?edit=<?=$management['management_ID']?>" class="btn btn-primary btn-sm m-1">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </a>
                                        <?php if($management['management_type'] != 'A'): ?>
                                            <?php if($management['management_status'] == 'D'): ?>
                                            <a href="<?=ADMIN_URL?>/management.php?toggle=<?=$management['management_ID']?>" class="btn btn-success btn-sm m-1">
                                                <i class="fas fa-check-double mr-2"></i> Unban
                                            </a>
                                            <?php else: ?>
                                            <a href="<?=ADMIN_URL?>/management.php?toggle=<?=$management['management_ID']?>" class="btn btn-danger btn-sm m-1">
                                                <i class="fas fa-ban mr-2"></i> Ban
                                            </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
</section>