<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Manage Users</li>
        </ul>
    </div>
</div>

<style>
    .participant-title {
        display: block;
        margin: 20px 0 20px 0;
        position: relative;
    }
    .participant-title::before {
        content: "";
        width: 100%;
        height: 1px;
        background: #e0e0e0;
        top: 50%;
        left: 0;
        position: absolute;
    }

    .participant-title h1 {
        font-size: 18px;
        font-weight: 300;
        color: #777;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: table;
        background: #fff;
        padding-right: 18px;
        position: relative;
        z-index: 1;
    }
</style>

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
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Participant</h4>
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
                            <div class="participant-title" style="margin-top: 0;">
                                <h1>User Details</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_fname">First Name</label>
                                        <input type="text" name="e_fname" id="e_fname" class="form-control" placeholder="e.g. Muhammad" value="<?=isset($e_fname)?$e_fname:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_lname">Last Name</label>
                                        <input type="text" name="e_lname" id="e_lname" class="form-control" placeholder="e.g. Ali" value="<?=isset($e_lname)?$e_lname:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_mobile">Mobile</label>
                                        <input type="text" name="e_mobile" id="e_mobile" class="form-control" placeholder="e.g. 03022733301" value="<?=isset($e_mobile)?$e_mobile:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_email">Email</label>
                                        <input type="email" name="e_email" id="e_email" class="form-control" placeholder="e.g. mail@email.com" value="<?=isset($e_email)?$e_email:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_ambassador">Select Ambassador</label>
                                        <select name="e_ambassador" id="e_ambassador" class="form-control">
                                            <option value="">--select ambassador--</option>
                                            <?php foreach($ambassadors as $ambassador): ?>
                                                <option value="<?=$ambassador['ambassador_ID']?>" <?=(isset($e_ambassador) && $e_ambassador == $ambassador['ambassador_ID'])?'selected':''?>><?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname'].' ['.$ambassador['institute_name'].']'?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="participant-title">
                                <h1>Participation</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_comp">Competition</label>
                                        <select name="e_comp" id="e_comp" class="form-control">
                                            <option value="">--select competition--</option>
                                            <?php foreach($competitions as $competition): ?>
                                                <option value="<?=$competition['competition_ID']?>" <?=(isset($e_comp) && $e_comp == $competition['competition_ID'])?'selected':''?>><?=$competition['competition_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="e_team">Team name</label>
                                        <input type="text" name="e_team" id="e_team" class="form-control" placeholder="e.g. Evolution" value="<?=isset($e_team)?$e_team:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-4" id="afterTeam">
                                    <div class="row">
                                        <div class="col-sm-6 p-0">
                                            <div class="form-group">
                                                <label for="e_members">No. of team members</label>
                                                <input type="number" name="e_members" id="e_members" class="form-control" placeholder="e.g. 3" value="<?=isset($e_members)?$e_members:''?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 p-0">
                                            <button type="button" id="addmembers" class="btn btn-primary btn-sm btn-block" style="margin-top: 35px">Add Names</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_university">University</label>
                                        <select name="e_university" id="e_university" class="form-control">
                                            <option value="">--select university--</option>
                                            <?php foreach($universities as $university): ?>
                                                <option value="<?=$university['institute_ID']?>" <?=(isset($e_university) && $e_university == $university['institute_ID'])?'selected':''?>><?=$university['institute_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                document.querySelector('#addmembers').addEventListener('click', function(e){
                                    e.preventDefault();
                                    
                                    let totalmembers = document.querySelector('#e_members').value.trim();
                                    
                                    if(totalmembers != "") {
                                        totalmembers = Number(totalmembers)
                                        if(Number.isInteger(totalmembers)){
                                            
                                            document.querySelectorAll('input[name="e_tmembers[]').forEach(function(item){
                                                item.parentElement.parentElement.remove();
                                            })
                                            
                                            for(let i = 0; i < totalmembers; i++) {
                                                ht = `<div class="form-group">
                                                            <label for="e_member-${i}">Member [${totalmembers - i}]</label>
                                                            <input type="text" name="e_tmembers[]" id="e_member-${i}" class="form-control" placeholder="e.g. Ahmed" value="">
                                                        </div>`
                                                let di = document.createElement('div');
                                                di.setAttribute('class', 'col-sm-4')
                                                di.innerHTML = ht;
                                                
                                                let aT = document.querySelector('#afterTeam')
                                                aT.parentNode.insertBefore(di, aT.nextSibling)
                                            }
                                            
                                        }
                                    }
                                    
                                })
                            </script>

                            <div class="participant-title">
                                <h1>Transaction</h1>
                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="e_amount">Recieved Amount</label>
                                        <input type="text" name="e_amount" id="e_amount" class="form-control" placeholder="e.g. 1500" value="<?=isset($e_amount)?$e_amount:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="e_discount">Discount</label>
                                        <input type="text" name="e_discount" id="e_discount" class="form-control" placeholder="e.g. 100" value="<?=isset($e_discount)?$e_discount:''?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="e_coupon">Coupon Used</label>
                                        <select name="e_coupon" id="e_coupon" class="form-control">
                                            <option value="">--select coupon--</option>
                                            <?php foreach($coupons as $coupon): ?>
                                                <option value="<?=$coupon['coupon_ID']?>" <?=(isset($e_coupon) && $e_coupon == $coupon['coupon_ID'])?'selected':''?>><?=$coupon['coupon_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="e_collected">Collected By</label>
                                        <select name="e_collected" id="e_collected" class="form-control">
                                            <option value="">--select person--</option>
                                            <optgroup label="Management">
                                            <?php foreach($managements as $management): ?>
                                                <option value="m_<?=$management['management_ID']?>" <?=(isset($e_collected) && $e_collected == 'm_'.$management['management_ID'])?'selected':''?>><?=$management['management_fname'].' '.$management['management_lname']?></option>
                                            <?php endforeach; ?>
                                            </optgroup>
                                            <optgroup label="Ambassador">
                                            <?php foreach($ambassadors as $ambassador): ?>
                                                <option value="a_<?=$ambassador['ambassador_ID']?>" <?=(isset($e_collected) && $e_collected == 'a_'.$ambassador['ambassador_ID'])?'selected':''?>><?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname'].' ['.$ambassador['institute_name'].']'?></option>
                                            <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="form-group mt-4 row">
                                        <input type="submit" value="Save" name="add_participant" class="btn btn-primary col-sm-6">
                                        <input type="reset" value="Reset" class="btn btn-default col-sm-6">
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>