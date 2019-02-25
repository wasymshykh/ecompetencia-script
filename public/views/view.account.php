<div class="d-container">

    <div class="d-row">

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
                        <a href="#">remove</a>
                    <?php else: ?>
                        <i>none</i>
                        <a href="#">set</a>
                    <?php endif;?>
                </span>
            </div>
        </div>

    </div>


    <div class="d-row">

        <div class="d-title">
            <h1>Your <b>Participation</b></h1>
            <p>Your participation details in the competitions</p>
        </div>

        <div class="d-competition">
            <div class="comp-box-name">
                <div class="d-c-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="d-c-data">
                    <p>Competition</p>
                    <h1>Speed Programming</h1>
                </div>
            </div>
            <div class="d-comp-box">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="d-c-data">
                        <p>Members</p>
                        <h1>2</h1>
                        
                        <ul>
                            <li><span>1</span> Muhammad Waseem</li>
                            <li><span>2</span> Ahmed Ali</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-comp-box comp-status-unpaid">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-vote-yea"></i>
                    </div>
                    <div class="d-c-data">
                        <p>status</p>
                        <h1>Unpaid</h1>
                    </div>
                </div>
            </div>

            <div class="d-comp-box">
                <div class="d-comp-b-content">
                    <div class="d-c-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="d-c-data">
                        <p>Cash Due</p>
                        <h1>1500 <span>PKR</span></h1>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</div>