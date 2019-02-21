<form method="POST" action="" enctype="multipart/form-data">
    <div class="content-inner">

        <div class="content-title">
            <h1>Apply for <span>Team Member</span></h1>
            <h3>Become a part of <span>Ecompetencia 2019</span> team!</h3>
            <p><span>Note</span> Only Iqra University students are eligible to apply.</p>
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
                    <label for="program">Program</label>
                    <select name="programs" id="program">
                        <option value="">Select Program</option>
                        <option value="BBA" <?=(isset($program) && $program == "BBA")?'selected="true"':''?>>BBA</option>
                        <option value="Media Science" <?=(isset($program) && $program == "Media Science")?'selected="true"':''?>>Media Science</option>
                        <option value="AIFD" <?=(isset($program) && $program == "AIFD")?'selected="true"':''?>>AIFD</option>
                        <option value="BSSE" <?=(isset($program) && $program == "BSSE")?'selected="true"':''?>>BSSE</option>
                        <option value="BSCS" <?=(isset($program) && $program == "BSCS")?'selected="true"':''?>>BSCS</option>
                        <option value="BSEE/BEEE" <?=(isset($program) && $program == "BSEE/BEEE")?'selected="true"':''?>>BSEE/BEEE</option>
                        <option value="MBA" <?=(isset($program) && $program == "MBA")?'selected="true"':''?>>MBA</option>
                    </select>
                </div>
                <div class="form-row-box">
                    <label for="semester">Semester</label>
                    <select name="semesters" id="semester">
                        <option value="">Select Semester</option>
                        <?php for($i=1;$i<=8;$i++): ?>
                            <option value="Semester <?=$i?>" <?=(isset($semester) && $semester == 'Semester '. $i)?'selected':''?>>Semester <?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-row-box">
                    <label for="regno">Reg No</label>
                    <input type="text" name="reg" id="regno" placeholder="e.g. 36666" value="<?=isset($regno)?$regno:''?>">
                    <div class="activate"></div>
                </div>
            </div>



            <div class="form-row-checks">
                <div class="form-row-label">
                    <label>Skills</label>
                    <p>Feel free to select multiple</p>
                </div>
                <div class="form-row-checks-all">
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="marketing" value="Marketing" <?=(isset($skill) && in_array('Marketing', $skill))?'checked':''?>>
                        <label for="marketing">
                            <i class="fas fa-microphone-alt"></i>
                            <h3>Marketing</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="cwriting" value="Content Writing" <?=(isset($skill) && in_array('Content Writing', $skill))?'checked':''?>>
                        <label for="cwriting">
                            <i class="fas fa-pen-alt"></i>
                            <h3>Content Writing</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="gaming" value="Gaming" <?=(isset($skill) && in_array('Gaming', $skill))?'checked':''?>>
                        <label for="gaming">
                            <i class="fas fa-headset"></i>
                            <h3>Gaming</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="devlp" value="Development" <?=(isset($skill) && in_array('Development', $skill))?'checked':''?>>
                        <label for="devlp">
                            <i class="fas fa-code"></i>
                            <h3>Development</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="promo" value="Promotion" <?=(isset($skill) && in_array('Promotion', $skill))?'checked':''?>>
                        <label for="promo">
                            <i class="fas fa-bullhorn "></i>
                            <h3>Promotion</h3>
                        </label>
                    </div>
                    
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="sm" value="Social Media" <?=(isset($skill) && in_array('Social Media', $skill))?'checked':''?>>
                        <label for="sm">
                            <i class="fas fa-share-square"></i>
                            <h3>Social Media</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="mag" value="Management" <?=(isset($skill) && in_array('Management', $skill))?'checked':''?>>
                        <label for="mag">
                            <i class="fas fa-tasks"></i>
                            <h3>Management</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="regs" value="Registrations" <?=(isset($skill) && in_array('Registrations', $skill))?'checked':''?>>
                        <label for="regs">
                            <i class="fas fa-users-cog"></i>
                            <h3>Registrations</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="pr" value="Public Relation" <?=(isset($skill) && in_array('Public Relation', $skill))?'checked':''?>>
                        <label for="pr">
                            <i class="fas fa-users"></i>
                            <h3>Public Relation</h3>
                        </label>
                    </div>
                    <div class="form-row-check">
                        <input type="checkbox" name="skill[]" id="desg" value="Designing" <?=(isset($skill) && in_array('Designing', $skill))?'checked':''?>>
                        <label for="desg">
                            <i class="fas fa-pen-nib"></i>
                            <h3>Designing</h3>
                        </label>
                    </div>
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
                    <div class="form-row-box <?=(isset($experience) && $experience == "Yes")?'active':''?>" id="tellus">
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