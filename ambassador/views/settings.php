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
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Privacy Control</h4>
                    </div>
                    <div class="card-body">
                        <p>Contact your personal contact information.</p>
                        <?php if($success_privacy): ?>
                            <div class="alert alert-success">
                                <?=$success_privacy;?>
                            </div>
                        <?php endif; ?>
                        <?php if($error_privacy): ?>
                            <div class="alert alert-danger">
                                <?=$error_privacy;?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Contact Visibility <div class="badge badge-dark">Currently <b><?=($current['ambassador_show'] == 'P')?'Phone':'Email';?></b></div></label>
                                        <select name="privacy_contact" class="form-control">
                                            <option value="P" <?=($current['ambassador_show'] == 'P')?'selected':'';?>>Phone</option>
                                            <option value="E" <?=($current['ambassador_show'] == 'E')?'selected':'';?>>Email</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" name="save_privacy" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
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