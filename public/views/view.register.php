<section id="content">
    <form action="" method="POST">
    <div class="content-inner">

        <div class="c-form-page">
            <div class="content-title">
                <h1>User <span>Registration</span></h1>
                <h3>Easy <span>2 steps</span> handy registration!</h3>
            </div>
            <div class="c-form-content" style="min-height: 50vh;">
                <!-- <h2 style="text-transform: uppercase; font-weight: 900; letter-spacing: 2px; font-size: 3em; padding: 2em 0 0 0; text-align:center;">Registrations are closed!</h2>
                <p style="text-transform: uppercase; font-weight: 400; letter-spacing: 2px; font-size: 2.4em; padding: 0 0 2em 0; text-align:center;">No slots left, it's full house!</p> -->
                
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
                        <div class="form-row-box">
                            <label for="cnic">CNIC</label>
                            <input type="text" name="cnic" id="cnic" placeholder="e.g. 42501-7000000-1" value="<?=isset($cnic)?$cnic:'';?>" maxlength="15">
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


<style>

#pageFull {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: 0.5s all ease-in-out;
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

#pageFull.active {
    background: rgba(255, 255, 255, 0.5);
    z-index: 100;
    opacity: 1;
    visibility: visible;
    pointer-events: all;
}

.pageFull-modal {
    padding: 5em 5px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: 0.6s all ease-in-out;
    position: relative;
    width: 90%;
    max-width: 600px;
}

#pF-m-close {
    display: block;
    width: 50px;
    height: 50px;
    border: 1px solid #000;
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    background: #fff;
    cursor: pointer;
    opacity: 0;
    transition: 1s all ease-in-out;
}
#pF-m-close i {
    font-size: 2em;
    line-height: 50px;
}

#pageFull.active #pF-m-close {
    opacity: 1;
}

#pageFull.active .pageFull-modal {
    padding: 10em 25px;
}

.pageFull-modal h1 {
    font-size: 5em;
    font-weight: 900;
    text-align: center;
    color: #0b1921;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    opacity: 0;
}

.pageFull-modal h1::before {
    content: "";
    width: 30%;
    background-color: #0080c4;
    height: 5px;
    position: absolute;
    bottom: -4px;
    left: 50%;
    transform: translateX(-50%);
}

.pageFull-modal h3 {
    font-size: 2.4em;
    font-weight: 400;
    color: #0b1921;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 3px;
    margin-top: 0.5em;
    opacity: 0;
}

.pageFull-modal p {
    font-size: 1.4em;
    font-weight: 900;
    color: #85ab30;
    border-bottom: 1px solid #85ab30;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 5px;
    opacity: 0;
    margin: 0 auto;
    display: table;
    margin-top: 1em;
    padding: 0.1em 1em;
}

.pageFull-modal h1,
.pageFull-modal h3,
.pageFull-modal p {
    transition: 0.8s all ease-in-out 50ms;
    transform: scale(3);
}
#pageFull.active .pageFull-modal h1,
#pageFull.active .pageFull-modal h3,
#pageFull.active .pageFull-modal p {
    opacity: 1;
    transform: scale(1);
}


@media screen and (max-width: 620px) {
    .pageFull-modal h1 {
        font-size: 3em;
    }


    .pageFull-modal h1::before {
        height: 3px;
    }

    .pageFull-modal h3 {
        font-size: 1.4em;
    }

    .pageFull-modal p {
        font-size: 1em;
    }


}




</style>


<!-- <div id="pageFull">
    <div class="pageFull-modal">
        <div id="pF-m-close">
            <i class="fas fa-times"></i>
        </div>
        <h1>House Full!</h1>
        <h3>Registrations Closed</h3>
        <p>Hope to see there!</p>
    </div>
</div> -->


<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelector('#pageFull').classList.add('active');
    })

    document.querySelector('#pF-m-close').addEventListener('click', function() {
        document.querySelector('#pageFull').classList.remove('active');
    })

    document.querySelector('#pageFull').addEventListener('click', function (e) {
        if(e.target.classList.contains('active')) {
            document.querySelector('#pageFull').classList.remove('active');
        }
    })
</script>


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