<section id="content">
    <form action="" method="POST">
    <div class="content-inner">

        <div class="c-form-page">
            <div class="content-title">
                <h1>User <span>Registration</span></h1>
                <h3>Easy <span>2 steps</span> handy registration!</h3>
            </div>

            <div class="c-form-content">
                
                <?php if(isset($showConfirmed) && $showConfirmed): ?>
                <div class="registration-confirmed">
                    <div class="tick-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h1>Registration Successful!</h1>
                    <h3>You're welcome, <?=$first_name?>.</h3>
                    <p>Thank you registering for <span>Ecompetencia</span>. You can now login to your account</p>
                    <a href="<?=URL;?>/login.php">Go to login <i class="fas fa-arrow-right"></i></a>
                </div>

                <?php else: ?>
                
                <div class="form-loader">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>

                <?php if(!empty($error)): ?>
                <div class="form-error">
                    <div class="form-error-text">
                        <h3>Error!</h3>
                        <p><?=$error;?></p>
                    </div>
                </div>
                <?php endif; ?>
            
                <div class="step-1 active">
                    <div class="form-type-title">
                        <div class="form-type-step-n">
                            Step <span>One</span>
                        </div>
                        <div class="form-type-title-text">
                            <h3>Personal Information</h3>
                            <p>Provide your personal information</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-box">
                            <label for="fname">First Name</label>
                            <input type="text" name="firstname" id="fname" placeholder="e.g. Ali" value="<?=isset($first_name)?$first_name:'';?>">
                            <div class="activate"></div>
                        </div>
                        <div class="form-row-box">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lastname" id="lname" placeholder="e.g. Ahmed" value="<?=isset($last_name)?$last_name:'';?>">
                            <div class="activate"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-box">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phone" id="phonenumber" placeholder="e.g. 03000000000" value="<?=isset($phone)?$phone:'';?>" maxlength="11">
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
                    <div class="form-submit">
                        <button id="next">Next <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                
                <div class="step-2">
                    <div class="form-type-title">
                        <div class="form-type-step-n">
                            Step <span>Two</span>
                        </div>
                        <div class="form-type-title-text">
                            <h3>Login Information</h3>
                            <p>This information will be used for login</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-box">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="e.g. youremail@server.com" value="<?=isset($email)?$email:'';?>">
                            <div class="activate"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-row-box">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="******" value="">
                            <div class="activate"></div>
                        </div>
                        <div class="form-row-box">
                            <label for="password_c">Confirm Password</label>
                            <input type="password" name="password_c" id="password_c" placeholder="******" value="">
                            <div class="activate"></div>
                        </div>
                    </div>

                    <div class="form-submit">
                        <button id="back"><i class="fas fa-arrow-left"></i> Back</button>
                        <input type="submit" name="register" value="Submit">
                    </div>
                </div>

                <?php endif; ?>

            </div>

        </div>
    </form>
    </div>
</section>

<script>

    document.querySelector('#next').addEventListener('click',(e)=>{
        e.preventDefault();
        setTimeout(()=>{
            document.querySelector('.form-loader').classList.remove('active')
            document.querySelector('.step-2').classList.add('active');
            document.querySelector('.step-1').classList.remove('active');
        }, 500);
        document.querySelector('.form-loader').classList.add('active')
    })

    document.querySelector('#back').addEventListener('click',(e)=>{
        e.preventDefault();
        setTimeout(()=>{
            document.querySelector('.form-loader').classList.remove('active')
            document.querySelector('.step-2').classList.remove('active');
            document.querySelector('.step-1').classList.add('active');
        }, 500);
        document.querySelector('.form-loader').classList.add('active')

    })





    // Select option styles

    document.querySelectorAll('select').forEach(select =>{
        let options = select.children;
        let select_box = document.createElement('div');
        select_box.classList.add('select-box');
        let select_selected = document.createElement('div');
        select_selected.classList.add('select-selected');
        let span_tochng = document.createElement('span');
        span_tochng.classList.add('tochng');
        span_tochng.innerText = options[0].innerText;
        let select_selected_i = document.createElement('i');
        select_selected_i.classList.add('fa');
        select_selected_i.classList.add('fa-caret-down');
        select_selected.appendChild(span_tochng);
        select_selected.appendChild(select_selected_i);
        select_box.append(select_selected);
        let select_drop = document.createElement('div');
        select_drop.classList.add('select-drop');
        let select_drop_ul = document.createElement('ul');

        for(let i = 1; i < options.length; i++){
            let elem_li = document.createElement('li');
            elem_li.innerText = options[i].innerText;
            select_drop_ul.appendChild(elem_li);
        }
        select_drop.appendChild(select_drop_ul);
        select_box.appendChild(select_drop);
        select.parentElement.appendChild(select_box);
    });


    document.querySelectorAll('.select-selected').forEach(selected=>{
        selected.addEventListener('click', (e)=>{
            if(selected.nextElementSibling.classList.contains('select-open')){
                selected.nextElementSibling.classList.remove('select-open');
            } else {
                selected.nextElementSibling.classList.add('select-open');
            }
        })
    })

    document.querySelectorAll('.select-drop ul li').forEach(selected=>{
        selected.addEventListener('click', (e)=>{
            if(selected.parentElement.parentElement.classList.contains('select-open')){
                selected.parentElement.parentElement.classList.remove('select-open');
            } else {
                selected.parentElement.parentElement.classList.add('select-open');
            }
            let selectedItem = e.target.textContent;
            
            let selectionMain = selected.parentElement.parentElement.parentElement.previousElementSibling.children;
            
            let attrselected = document.createAttribute('selected');
            attrselected.value = 'true';

            for(let i = 0; i < selectionMain.length; i++) {
                if(selectionMain[i].textContent === selectedItem) {
                   selectionMain[i].attributes.setNamedItem(attrselected);
                } else {
                    if(selectionMain[i].attributes.getNamedItem('selected') != null){
                        selectionMain[i].attributes.removeNamedItem('selected');
                    }
                }
            }
            selected.parentElement.parentElement.previousElementSibling.firstElementChild.textContent = selectedItem;
            

        })
    })

    document.body.addEventListener('click', e=>{
        if(!e.target.classList.contains('select-selected')){
            document.querySelectorAll('.select-drop').forEach(sd=>{
                sd.classList.remove('select-open');
            })
        }
    })

    window.addEventListener('load',()=>{
        document.querySelectorAll('select').forEach(sl=>{
            sl.nextElementSibling.firstElementChild.firstElementChild.textContent = sl.selectedOptions[0].textContent;
        })
    })
    
</script>