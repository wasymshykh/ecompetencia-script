<section id="content">
    <form action="" method="POST">
    <div class="content-inner">

        <div class="c-form-page">
            <div class="content-title">
                <h1>User <span>Login</span></h1>
                <h3>Login to view your <span>dashboard</span>!</h3>
            </div>

            <div class="c-form-content">
                
                <?php if(!empty($error)): ?>
                <div class="form-error">
                    <div class="form-error-text">
                        <h3>Error!</h3>
                        <p><?=$error;?></p>
                    </div>
                </div>
                <?php endif; ?>
            
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="e.g. youremail@server.com" value="<?=isset($email)?$email:'';?>">
                        <div class="activate"></div>
                    </div>
                    <div class="form-row-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="******" value="">
                        <div class="activate"></div>
                    </div>
                </div>

                <div class="form-submit">
                    <input type="submit" name="login" value="Submit">
                </div>


                <div class="form-type-title login-p">
                    <div class="form-type-step-n">
                        <span>Forgot</span> Password?
                    </div>
                    <div class="form-type-title-text">
                        <h3>Not a problem!</h3>
                        <p>Your can request your reset link here: <a href="<?=URL?>/reset_password.php">Reset Now</a></p>
                    </div>
                </div>

            </div>

        </div>
    </form>
    </div>
</section>