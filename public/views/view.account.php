<?php if($showWarning): ?>
    <?php 
        $institutes = getInstitutes();
        include 'institute_warning.php'; 
    ?>
<?php else: ?>
<div class="d-container">

    <div class="d-row">

    <?php if(!empty($m_error[0]) && $m_error[0]): ?>
    <div class="form-error">
        <div class="form-error-text">
            <p><b>Error!</b> <?=$m_error[1];?></p>
        </div>
    </div>
    <?php endif; ?>

        <div class="d-title">
            <h1>Your <b>Details</b></h1>
            <p>Details about your (team leader) profile.</p>
        </div>

        <div class="d-details">
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-user"></i>
                    Team leader
                </span>
                <span class="d-d-value">
                    <?=$user['user_fname'] . ' ' . $user['user_lname'];?>
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-mobile"></i>
                    Your mobile
                </span>
                <span class="d-d-value">
                    <?=$user['user_phone']?>
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-envelope "></i>
                    Your email
                </span>
                <span class="d-d-value">
                    <?=$user['user_email']?>
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-university"></i>
                    Your university
                </span>
                <span class="d-d-value">
                    <?=$user['institute_name']?>
                </span>
            </div>
            <div class="d-detail-box">
                <span class="d-d-type">
                    <i class="fas fa-user-tie"></i>
                    Your ambassador
                </span>
                <span class="d-d-value">
                    <?php if($user['ambassador_ID'] != NULL):
                        $ambassador = getAmbassadorDetailsByID($user['ambassador_ID']);
                    ?>
                        <?=$ambassador['ambassador_fname'] . ' ' . $ambassador['ambassador_lname'] ?>
                        <i>
                        <?php if($ambassador['ambassador_show'] == 'P'): ?>
                            <?=$ambassador['ambassador_phoneno']?>
                        <?php endif; ?>
                        <?php if($ambassador['ambassador_show'] == 'E'): ?>
                            <?=$ambassador['ambassador_email']?>
                        <?php endif; ?>
                        </i>
                        <a href="<?=URL?>/public/account.php?rm=ambassador">remove</a>
                    <?php else: ?>
                        <i>none</i>
                        <a href="" id="setamm">set</a>
                        <div id="setamm-open">
                            <?php if(count($ambassadors) > 0): ?>
                            <form action="" method="POST" id="changeamm">
                                <select name="selected_am" id="selectamm">
                                    <option value="">Select Ambassador...</option>
                                    <?php foreach($ambassadors as $ambassador): ?>
                                    <option value="<?=$ambassador['ambassador_ID']?>"><?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname']. ' ['.$ambassador['institute_name'].']'?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                            <?php else: ?>
                            <p>No ambassador available.</p>
                            <?php endif; ?>
                        </div>

                        <script>
                            document.querySelector('#setamm').addEventListener('click',(e)=>{
                                e.preventDefault();
                                document.querySelector('#setamm-open').classList.add('select-active');
                            })
                            document.querySelector('#selectamm').addEventListener('change',(e)=>{
                                document.querySelector('#changeamm').submit();
                            })
                        </script>
                    <?php endif;?>
                </span>
            </div>
        </div>

    </div>

    <div class="d-row">

        <div class="d-title">
            <h1><b>Payment</b> Procedure</h1>
            <p>Confirm your participation as soon as possible</p>
        </div>
        <div class="d-msg-progress">
            <ul>
                <li>Submit your payment to <a href="<?=URL?>/ambassador.php" target="blank">ambassador</a> (first, set ambassador in your account).</li>
                <li>Submit your payment at our desk (placed at Iqra University EDC Campus, KHI).</li>
                <li>Submit your payment using jazz cash (03092681560) (kindly send the screenshot of trasaction ID/message on ecompetencia2019@gmail.com (Subject: Transaction)</li>
            </ul>
        </div>

    </div>

    <div class="d-row">

        <div class="d-title">
            <h1>Your <b>Participation</b></h1>
            <p>Your participation details in the competitions</p>
        </div>

        <?php if(count($participations) < 1): ?>
            <div class="d-msg-progress">
                <p>You haven't participated in any event yet. <a href="participate.php">Participate Now</a></p>
            </div>
        <?php else: ?>
            <?php foreach($participations as $participation): 
                // calculating members
                $members = getMembersOfParticipant($participation['participant_ID']);
            ?>
            <div class="d-competition">
                <div class="comp-box-name">
                    <div class="d-c-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="d-c-data">
                        <p>Competition</p>
                        <h1><?=$participation['competition_name']?></h1>
                    </div>
                </div>
                <div class="d-comp-box">
                    <div class="d-comp-b-content">
                        <div class="d-c-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="d-c-data">
                            <p>Members</p>
                            <h1><?=count($members)?></h1>
                            <?php if(count($members) > 0): ?>
                            <ul>
                                <?php $i = 0;foreach($members as $member):$i++;?>
                                <li><span><?=$i;?></span> <?=$member['member_name']?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="d-comp-box comp-status-<?=($participation['transaction_status']=='U')?'unpaid':'';?><?=($participation['transaction_status']=='P')?'paid':'';?><?=($participation['transaction_status']=='C')?'credit':'';?>">
                    <div class="d-comp-b-content">
                        <div class="d-c-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <div class="d-c-data">
                            <p>status</p>
                            <h1><?=($participation['transaction_status']=='U')?'Unpaid':'';?><?=($participation['transaction_status']=='P')?'Paid':'';?><?=($participation['transaction_status']=='C')?'Unconfirmed':'';?></h1>
                            <p>Contact Team</p>
                        </div>
                    </div>
                </div>

                <div class="d-comp-box">
                    <div class="d-comp-b-content">
                        <div class="d-c-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="d-c-data">
                            <?php if($participation['transaction_status']=='C'): 
                                $due = (getCreditsByTransactionId($participation['transaction_ID']))['credit_amount'];
                                ?>
                                <p>Cash Paid</p>
                                <h1><?=$participation['transaction_total']-$due;?> <span>PKR</span></h1>
                                <p>Cash Due</p>
                                <h1><?=$due;?> <span>PKR</span></h1>
                            <?php else: ?>
                                <p>Cash <?=($participation['transaction_status']=='U')?'Due':'Paid';?></p>
                                <h1><?=$participation['transaction_total'];?> <span>PKR</span></h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    
    </div>

</div>
<?php endif; ?>