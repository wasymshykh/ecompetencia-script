<form method="POST" action="" enctype="multipart/form-data">
    <div class="content-inner">

        <div class="content-title">
            <h1>Apply for <span>Ambassador</span></h1>
            <h3>Represent <span>Ecompetencia 2019</span> at your institute!</h3>
            <p><span>Note</span> only students of respected institutes are eligible for submitting the application.</p>
        </div>

        <?php if(!empty($error)): ?>
            <div class="content-error">
                <ul>
                    <li><b>Error!</b> <?=$error;?></li>
                </ul>
            </div>
        <?php endif; ?>
                    
        <?php if(isset($success) && !empty($success)): ?>
            <div class="content-success">
                <?=$success;?>
            </div>
        <?php endif; ?>


        <div class="content-body">
            <div class="form-row">
                <div class="form-row-box">
                    <label for="fname">First Name</label>
                    <input type="text" name="firstname" id="fname" placeholder="e.g. Ali" value="<?=isset($fname)?$fname:''?>">
                    <div class="activate"></div>
                </div>
                <div class="form-row-box">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lastname" id="lname" placeholder="e.g. Ahmed" value="<?=isset($lname)?$lname:''?>">
                    <div class="activate"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-box">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="e.g. myemail@server.com" value="<?=isset($email)?$email:''?>">
                    <div class="activate"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-box">
                    <label for="cell">Cell/Phone Number</label>
                    <input type="text" name="phone" id="cell" placeholder="e.g. 03000000000" value="<?=isset($phonenumber)?$phonenumber:''?>" maxlength="11">
                    <div class="activate"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-row-box">
                    <label for="institute">Institute</label>
                    <select name="institute" id="institute">
                        <option value="">Select Institute</option>
                        <?php foreach($institutes as $ins):?>
                        <option value="<?=$ins['institute_ID']?>" <?=(isset($institute) && $ins['institute_ID'] == $institute)?'selected="true"':''?>><?=$ins['institute_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="form-row">
                <div class="form-row-fall">
                    <div class="form-row-box experience">
                        <label for="experience">Experience</label>
                        <p>Do You Have any Experience?</p>
                        <select name="experience" id="experience">
                            <option value="">Choose</option>
                            <option value="Yes" <?=(isset($experience) && $experience == "Yes")?'selected="true"':''?>>Yes</option>
                            <option value="No" <?=(isset($experience) && $experience == "No")?'selected="true"':''?>>No</option>
                        </select>
                    </div>
                    <div class="form-row-box  <?=(isset($experience) && $experience == "Yes")?'active':''?>" id="tellus">
                        <label for="writeExp">Tell us about it</label>
                        <textarea name="experiencetext" id="writeExp" placeholder="Mention Your Experience"><?=isset($experiencetext)?$experiencetext:''?></textarea>
                    </div>
                </div>
                <div class="form-row-box fileup">
                    <label for="uploadFile">Select Photo</label>
                    <p>Make sure to select best pixelated photo. Allowed formats are <b>JPG</b>, <b>JPEG</b> & <b>PNG</b></p>
                    <input type="file" name="avatar" id="uploadFile">
                    <div class="activate"></div>
                </div>
            </div>
            
            
            <div class="form-submit">
                <input type="submit" name="apply" value="Submit Application">
            </div>


        </div>
    </div>
</form>