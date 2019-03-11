<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Settings</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
    <?php if($_SESSION['management']['management_type'] === 'A'): ?>
        <?php if(!empty($errors)): ?>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <b>-</b> <?=$error?>.
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

        <div class="row mt-4">
            <?php if($_SESSION['management']['management_type'] === 'A'): ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Page Control</h4>
                    </div>
                    <div class="card-body">
                        <p>Enable/Disable page access for users.</p>

                       <form action="" method="POST">
                           <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Team Applicants <div class="badge badge-dark">Currently <b><?=($setting_team_app == 'true')?'Enabled':'Disabled';?></b></div></label>
                                        <select name="page_teamapp" class="form-control">
                                            <option value="true" <?=($setting_team_app == 'true')?'selected':'';?>>Enabled</option>
                                            <option value="false" <?=($setting_team_app == 'false')?'selected':'';?>>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ambassador Applicants <div class="badge badge-dark">Currently <b><?=($setting_ambassador_app == 'true')?'Enabled':'Disabled';?></b></div></label>
                                        <select name="page_ambassadorapp" class="form-control">
                                            <option value="true" <?=($setting_ambassador_app == 'true')?'selected':'';?>>Enabled</option>
                                            <option value="false" <?=($setting_ambassador_app == 'false')?'selected':'';?>>Disabled</option>
                                        </select>
                                    </div>
                                </div>
                           </div>
                           <div class="line"></div>
                           <div class="form-group row">
                                <div class="col-sm-4 offset-sm-4">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" name="save_pages" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                       </form>

                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Password Reset</h4>
                    </div>
                    <div class="card-body">
                        <p>Reset your current password</p>
                        <?php if($success_password): ?>
                            <div class="alert alert-success">
                                <?=$success_password;?>
                            </div>
                        <?php endif; ?>
                        <?php if($error_password): ?>
                            <div class="alert alert-danger">
                                <?=$error_password;?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="npass">New Password</label>
                                        <input type="password" id="npass" name="password" class="form-control" placeholder="*********">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="npass_c">New Password Confirm</label>
                                        <input type="password" id="npass_c" name="password_c" class="form-control" placeholder="*********">
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="save_password" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>