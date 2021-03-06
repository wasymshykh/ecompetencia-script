<section id="content">
    <form action="" method="POST">
    <div class="content-inner">

        <div class="c-form-page">
            <div class="content-title">
                <h1>Reset <span>Password</span></h1>
                <h3>Having trouble with login? <span>reset it</span>!</h3>
            </div>

            <div class="c-form-content">
                
                <?php if(isset($success)): ?>
                <div class="form-success">
                    <div class="form-success-text">
                        <h3>Success!</h3>
                        <p><?=$success;?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($error)): ?>
                <div class="form-error">
                    <div class="form-error-text">
                        <h3>Error!</h3>
                        <p><?=$error;?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(isset($reset_request)): ?>
                    <?php if($reset_display): ?>
                <div class="form-type-title login-p">
                    <div class="form-type-step-n">
                        <span>Kindly</span> Note
                    </div>
                    <div class="form-type-title-text">
                        <h3>You can reset now!</h3>
                        <p>Kindly make sure to write password properly.</a></p>
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" placeholder="********" value="">
                        <div class="activate"></div>
                    </div>
                    <div class="form-row-box">
                        <label for="password_c">New Password Confirm</label>
                        <input type="password" name="password_c" id="password_c" placeholder="********" value="">
                        <div class="activate"></div>
                    </div>
                </div>

                <div class="form-submit">
                    <input type="submit" name="reset_request" value="Submit">
                </div>
                    <?php endif; ?>

                <?php else: ?>
                <div class="form-type-title login-p">
                    <div class="form-type-step-n">
                        <span>Kindly</span> Note
                    </div>
                    <div class="form-type-title-text">
                        <h3>We'll email you!</h3>
                        <p>Kindly make sure to write valid email, we'll email you the reset link.</a></p>
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="e.g. youremail@server.com" value="<?=isset($email)?$email:'';?>">
                        <div class="activate"></div>
                    </div>
                </div>

                <div class="form-submit">
                    <input type="submit" name="reset" value="Submit">
                </div>
                <?php endif; ?>

            </div>

        </div>
    </form>
    </div>
</section>